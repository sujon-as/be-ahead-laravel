<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;

class VisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Vision::latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('title', function ($row) {
                    return ($row->title) ?? 'N/A';
                })

                ->addColumn('description', function ($row) {
                    return ($row->description) ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('visions.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

                    $btn .= '&nbsp;';

                    $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                // search customization
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] != '') {
                        $searchValue = $request->search['value'];
                        $query->where(function($q) use ($searchValue) {
                            $q->where('title', 'like', "%{$searchValue}%")
                                ->orWhere('description', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['title', 'description', 'action'])
                ->make(true);
        }

        return view('admin.visions.index');
    }
    public function create()
    {
        $count = Vision::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You have already added data. You can edit or delete the existing data to add new one.",
                'alert-type' => "warning",
            );
            return redirect()->route('visions.index')->with($notification);
        }

        return view('admin.visions.create');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new Vision();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('visions.index')->with($notification);

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

            return redirect()->route('visions.index')->with($notification);
        }
    }
    public function show(Vision $vision)
    {
        return view('admin.visions.edit', compact('vision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Vision $vision)
    {
        //
    }
    public function update(Request $request, Vision $vision)
    {
        try
        {
            $vision->title = $request->title;
            $vision->description = $request->description;
            $vision->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('visions.index')->with($notification);

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

            return redirect()->route('visions.index')->with($notification);
        }
    }
    public function destroy(Vision $vision)
    {
        try
        {
            $vision->delete();

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
