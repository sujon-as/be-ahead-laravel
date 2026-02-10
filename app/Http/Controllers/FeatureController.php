<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Feature::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('title_1', function ($row) {
                    return $row->title_1 ?? 'N/A';
                })

                ->addColumn('title_2', function ($row) {
                    return $row->title_2 ?? 'N/A';
                })

                ->addColumn('bg_img', function($row){
                    $url = asset($row->bg_img);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('status', function($row){
                    return '<label class="switch"><input class="' . ($row->status === 'Active' ? 'active-data' : 'decline-data') . '" id="status-update"  type="checkbox" ' . ($row->status === 'Active' ? 'checked' : '') . ' data-id="'.$row->id.'"><span class="slider round"></span></label>';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('features.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

                    $btn .= '&nbsp;';

                    $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                // search customization
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] != '') {
                        $searchValue = $request->search['value'];
                        $query->where(function($q) use ($searchValue) {
                            $q->where('title_1', 'like', "%{$searchValue}%")
                                ->orWhere('title_2', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['title_1', 'title_2', 'title_3', 'bg_img', 'marker_img', 'status', 'action'])
                ->make(true);
        }

        return view('admin.features.index');
    }
    public function create()
    {
        return view('admin.features.create');
    }
    public function store(FeatureRequest $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $bgFilePath = null;
            if ($request->hasFile('bg_img')) {
                $bgFilePath = storeFile($request->file('bg_img'), 'bg_images', 'bgImage_');
            }

            $data = new Feature();
            $data->title_1 = $request->title_1;
            $data->title_2 = $request->title_2;
            $data->bg_img = $bgFilePath;
            $data->status = $request->status;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('features.index')->with($notification);

        } catch(Exception $e) {
            DB::rollback();

            // Log the error
            Log::error('Error in store: ', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine()
            ]);

            $notification=array(
                'message' => 'Something went wrong!!!',
                'alert-type' => 'error'
            );

            return redirect()->route('features.index')->with($notification);
        }
    }
    public function show(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        //
    }
    public function update(FeatureRequest $request, Feature $feature)
    {
        try
        {
            // Handle file upload
            $bgFilePath = $feature->bg_img;
            if ($request->hasFile('bg_img')) {
                $bgFilePath = updateFile($request->file('bg_img'), 'bg_images', 'bgImage_', $feature->bg_img);
            }

            $feature->title_1 = $request->title_1;
            $feature->title_2 = $request->title_2;
            $feature->bg_img = $bgFilePath;
            $feature->status = $request->status;
            $feature->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('features.index')->with($notification);

        } catch(Exception $e) {
            // Log the error
            Log::error('Error in update: ', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine()
            ]);

            $notification=array(
                'message' => 'Something went wrong!!!',
                'alert-type' => 'error'
            );

            return redirect()->route('features.index')->with($notification);
        }
    }
    public function destroy(Feature $feature)
    {
        try
        {
            deleteOldFile($feature->bg_img);
            deleteOldFile($feature->marker_img);
            $feature->delete();

            return response()->json([
                'status'=>true,
                'message'=>'Successfully data has been deleted'
            ]);
        } catch(Exception $e) {
            // Log the error
            Log::error('Error in deleting data: ', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!!!'
            ]);
        }
    }
    public function featureStatusUpdate(FeatureRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = Feature::findorfail($request->id);
            $data->status = $request->status;
            $data->update();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Feature status updated successfully."
            ]);
        } catch(Exception $e) {
            DB::rollBack();
            // Log the error
            Log::error('Error in updating status: ', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'status' => false,
                'message' => "Something went wrong!!!"
            ]);
        }
    }
}
