<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\AwardTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;
use Exception;

class AwardTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = AwardTitle::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('description', function ($row) {
                    return $row->description ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('award-titles.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

                    $btn .= '&nbsp;';

                    $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                // search customization
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] != '') {
                        $searchValue = $request->search['value'];
                        $query->where(function($q) use ($searchValue) {
                            $q->where('description', 'like', "%{$searchValue}%")
                                ->orWhere('description', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['description', 'action'])
                ->make(true);
        }

        return view('admin.awardTitles.index');
    }
    public function create()
    {
        $count = AwardTitle::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You can't add more than one data",
                'alert-type' => "error",
            );

            return redirect()->route('award-titles.index')->with($notification);
        }
        return view('admin.awardTitles.create');
    }
    public function store(GalleryRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new AwardTitle();
            $data->description = $request->description;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('award-titles.index')->with($notification);

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

            return redirect()->route('award-titles.index')->with($notification);
        }
    }
    public function show(AwardTitle $awardTitle)
    {
        return view('admin.awardTitles.edit', compact('awardTitle'));
    }
    public function edit(AwardTitle $awardTitle)
    {
        //
    }
    public function update(GalleryRequest $request, AwardTitle $awardTitle)
    {
        try
        {
            $awardTitle->description = $request->description;
            $awardTitle->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('award-titles.index')->with($notification);

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

            return redirect()->route('award-titles.index')->with($notification);
        }
    }
    public function destroy(AwardTitle $awardTitle)
    {
        try
        {
            $awardTitle->delete();

            return response()->json([
                'status' => true,
                'message' => 'Successfully data has been deleted'
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
}
