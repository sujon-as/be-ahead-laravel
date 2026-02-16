<?php

namespace App\Http\Controllers;

use App\Http\Requests\CauseTitleRequest;
use App\Models\RecentCauseTitle;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;

class RecentCauseTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RecentCauseTitle::latest();

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

                    $btn .= ' <a href="'.route('recent-cause-titles.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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

        return view('admin.recentCauseTitles.index');
    }
    public function create()
    {
        $count = RecentCauseTitle::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You have already added data. You can edit or delete the existing data to add new one.",
                'alert-type' => "warning",
            );
            return redirect()->route('recent-cause-titles.index')->with($notification);
        }

        return view('admin.recentCauseTitles.create');
    }
    public function store(CauseTitleRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new RecentCauseTitle();
            $data->title_1 = $request->title_1;
            $data->title_2 = $request->title_2;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('recent-cause-titles.index')->with($notification);

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

            return redirect()->route('recent-cause-titles.index')->with($notification);
        }
    }
    public function show(RecentCauseTitle $recent_cause_title)
    {
        return view('admin.recentCauseTitles.edit', compact('recent_cause_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(RecentCauseTitle $causeTitle)
    {
        //
    }
    public function update(CauseTitleRequest $request, RecentCauseTitle $recent_cause_title)
    {
        try
        {
            $recent_cause_title->title_1 = $request->title_1;
            $recent_cause_title->title_2 = $request->title_2;
            $recent_cause_title->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('recent-cause-titles.index')->with($notification);

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

            return redirect()->route('recent-cause-titles.index')->with($notification);
        }
    }
    public function destroy(RecentCauseTitle $recent_cause_title)
    {
        try
        {
            $recent_cause_title->delete();

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
