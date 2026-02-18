<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\MissionTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;
use Exception;

class MissionTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = MissionTitle::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('description', function ($row) {
                    return strip_tags($row->description) ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('mission-titles.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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

        return view('admin.missionTitles.index');
    }
    public function create()
    {
        $count = MissionTitle::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You can't add more than one data",
                'alert-type' => "error",
            );

            return redirect()->route('mission-titles.index')->with($notification);
        }
        return view('admin.missionTitles.create');
    }
    public function store(GalleryRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new MissionTitle();
            $data->description = $request->description;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('mission-titles.index')->with($notification);

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

            return redirect()->route('mission-titles.index')->with($notification);
        }
    }
    public function show(MissionTitle $missionTitle)
    {
        return view('admin.missionTitles.edit', compact('missionTitle'));
    }
    public function edit(MissionTitle $missionTitle)
    {
        //
    }
    public function update(GalleryRequest $request, MissionTitle $missionTitle)
    {
        try
        {
            $missionTitle->description = $request->description;
            $missionTitle->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('mission-titles.index')->with($notification);

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

            return redirect()->route('mission-titles.index')->with($notification);
        }
    }
    public function destroy(MissionTitle $missionTitle)
    {
        try
        {
            $missionTitle->delete();

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
}
