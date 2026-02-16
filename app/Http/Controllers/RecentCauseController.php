<?php

namespace App\Http\Controllers;

use App\Http\Requests\CauseRequest;
use App\Models\Cause;
use App\Models\RecentCause;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;

class RecentCauseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RecentCause::latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('percentage', function ($row) {
                    return $row->percentage ?? 'N/A';
                })

                ->addColumn('content', function ($row) {
                    return strip_tags($row->content) ?? 'N/A';
                })

                ->addColumn('img', function($row){
                    $url = asset($row->img);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('front-recent-causes.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

                    $btn .= '&nbsp;';

                    $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                // search customization
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] != '') {
                        $searchValue = $request->search['value'];
                        $query->where(function($q) use ($searchValue) {
                            $q->where('content', 'like', "%{$searchValue}%")
                                ->orWhere('percentage', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['percentage', 'content', 'img', 'action'])
                ->make(true);
        }

        return view('admin.recentCauses.index');
    }
    public function create()
    {
        return view('admin.recentCauses.create');
    }
    public function store(CauseRequest $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $bgFilePath = null;
            if ($request->hasFile('img')) {
                $bgFilePath = storeFile(
                    $request->file('img'),
                    'recent_cause_images',
                    'recentCauseImages_');
            }

            $data = new RecentCause();
            $data->percentage = $request->percentage;
            $data->content = $request->content;
            $data->img = $bgFilePath;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('front-recent-causes.index')->with($notification);

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

            return redirect()->route('front-recent-causes.index')->with($notification);
        }
    }
    public function show(RecentCause $front_recent_cause)
    {
        return view('admin.recentCauses.edit', compact('front_recent_cause'));
    }
    public function edit(RecentCause $cause)
    {
        //
    }
    public function update(CauseRequest $request, RecentCause $front_recent_cause)
    {
        try
        {
            // Handle file upload
            $bgFilePath = $front_recent_cause->img;
            if ($request->hasFile('img')) {
                $bgFilePath = updateFile(
                    $request->file('img'),
                    'recent_cause_images',
                    'recentCauseImages_',
                    $bgFilePath);
            }

            $front_recent_cause->percentage = $request->percentage;
            $front_recent_cause->content = $request->content;
            $front_recent_cause->img = $bgFilePath;
            $front_recent_cause->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('front-recent-causes.index')->with($notification);

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

            return redirect()->route('front-recent-causes.index')->with($notification);
        }
    }
    public function destroy(RecentCause $front_recent_cause)
    {
        try
        {
            deleteOldFile($front_recent_cause->img);
            $front_recent_cause->delete();

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
