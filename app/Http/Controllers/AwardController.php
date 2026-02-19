<?php

namespace App\Http\Controllers;

use App\Http\Requests\AwardRequest;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;
use Exception;

class AwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Award::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('title', function ($row) {
                    return $row->title ?? 'N/A';
                })

                ->addColumn('count', function ($row) {
                    return $row->count ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('awards.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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
                                ->orWhere('count', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['title', 'count', 'action'])
                ->make(true);
        }

        return view('admin.awards.index');
    }
    public function create()
    {
        return view('admin.awards.create');
    }
    public function store(AwardRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new Award();
            $data->title = $request->title;
            $data->count = $request->count;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('awards.index')->with($notification);

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

            return redirect()->route('awards.index')->with($notification);
        }
    }
    public function show(Award $award)
    {
        return view('admin.awards.edit', compact('award'));
    }
    public function edit(Award $award)
    {
        //
    }
    public function update(AwardRequest $request, Award $award)
    {
        try
        {
            $award->title = $request->title;
            $award->count = $request->count;
            $award->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('awards.index')->with($notification);

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

            return redirect()->route('awards.index')->with($notification);
        }
    }
    public function destroy(Award $award)
    {
        try
        {
            $award->delete();

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
