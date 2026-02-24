<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerTitleRequest;
use App\Models\VolunteerTitle;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VolunteerTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = VolunteerTitle::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('img', function($row){
                    $url = asset($row->img);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('title_1', function ($row) {
                    return strip_tags($row->title_1) ?? 'N/A';
                })

                ->addColumn('title_2', function ($row) {
                    return strip_tags($row->title_2) ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('volunteer-titles.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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
                ->rawColumns(['img', 'title_1', 'title_2', 'action'])
                ->make(true);
        }

        return view('admin.volunteerTitles.index');
    }
    public function create()
    {
        $count = VolunteerTitle::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You can't add more than one data",
                'alert-type' => "error",
            );

            return redirect()->route('volunteer-titles.index')->with($notification);
        }
        return view('admin.volunteerTitles.create');
    }
    public function store(VolunteerTitleRequest $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $filePath = null;
            if ($request->hasFile('img')) {
                $filePath = storeFile(
                    $request->file('img'),
                    'vt_images',
                    'vtImage_'
                );
            }

            $data = new VolunteerTitle();
            $data->title_1 = $request->title_1;
            $data->title_2 = $request->title_2;
            $data->img = $filePath;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('volunteer-titles.index')->with($notification);

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

            return redirect()->route('volunteer-titles.index')->with($notification);
        }
    }
    public function show(VolunteerTitle $volunteerTitle)
    {
        return view('admin.volunteerTitles.edit', compact('volunteerTitle'));
    }
    public function edit(VolunteerTitle $volunteerTitle)
    {
        //
    }
    public function update(VolunteerTitleRequest $request, VolunteerTitle $volunteerTitle)
    {
        try
        {
            // Handle file upload
            $filePath = $volunteerTitle->img;
            if ($request->hasFile('img')) {
                $filePath = updateFile(
                    $request->file('img'),
                    'vt_images',
                    'vtImage_',
                    $volunteerTitle->img);
            }

            $volunteerTitle->title_1 = $request->title_1;
            $volunteerTitle->title_2 = $request->title_2;
            $volunteerTitle->img = $filePath;
            $volunteerTitle->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('volunteer-titles.index')->with($notification);

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

            return redirect()->route('volunteer-titles.index')->with($notification);
        }
    }
    public function destroy(VolunteerTitle $volunteerTitle)
    {
        try
        {
            deleteOldFile($volunteerTitle->img);
            $volunteerTitle->delete();

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
