<?php

namespace App\Http\Controllers;

use App\Http\Requests\CauseTitleRequest;
use App\Http\Requests\FeatureRequest;
use App\Models\CauseTitle;
use App\Models\Feature;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;

class CauseTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CauseTitle::latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('title_1', function ($row) {
                    return strip_tags($row->title_1) ?? 'N/A';
                })

                ->addColumn('title_2', function ($row) {
                    return strip_tags($row->title_2) ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('cause-titles.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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
                ->rawColumns(['title_1', 'title_2', 'action'])
                ->make(true);
        }

        return view('admin.causeTitles.index');
    }
    public function create()
    {
        $count = CauseTitle::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You have already added data. You can edit or delete the existing data to add new one.",
                'alert-type' => "warning",
            );
            return redirect()->route('cause-titles.index')->with($notification);
        }

        return view('admin.causeTitles.create');
    }
    public function store(CauseTitleRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new CauseTitle();
            $data->title_1 = $request->title_1;
            $data->title_2 = $request->title_2;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('cause-titles.index')->with($notification);

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

            return redirect()->route('cause-titles.index')->with($notification);
        }
    }
    public function show(CauseTitle $causeTitle)
    {
        return view('admin.causeTitles.edit', compact('causeTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(CauseTitle $causeTitle)
    {
        //
    }
    public function update(CauseTitleRequest $request, CauseTitle $causeTitle)
    {
        try
        {
            $causeTitle->title_1 = $request->title_1;
            $causeTitle->title_2 = $request->title_2;
            $causeTitle->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('cause-titles.index')->with($notification);

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

            return redirect()->route('cause-titles.index')->with($notification);
        }
    }
    public function destroy(CauseTitle $causeTitle)
    {
        try
        {
            $causeTitle->delete();

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
