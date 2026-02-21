<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentTitleRequest;
use App\Models\AppointmentTitle;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppointmentTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = AppointmentTitle::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('img', function($row){
                    $url = asset($row->img);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('title', function ($row) {
                    return strip_tags($row->title) ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('appointment-titles.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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
                                ->orWhere('title', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['img', 'title', 'action'])
                ->make(true);
        }

        return view('admin.appointmentTitles.index');
    }
    public function create()
    {
        $count = AppointmentTitle::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You can't add more than one data",
                'alert-type' => "error",
            );

            return redirect()->route('appointment-titles.index')->with($notification);
        }
        return view('admin.appointmentTitles.create');
    }
    public function store(AppointmentTitleRequest $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $filePath = null;
            if ($request->hasFile('img')) {
                $filePath = storeFile(
                    $request->file('img'),
                    'at_images',
                    'atImage_'
                );
            }

            $data = new AppointmentTitle();
            $data->title = $request->title;
            $data->img = $filePath;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('appointment-titles.index')->with($notification);

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

            return redirect()->route('appointment-titles.index')->with($notification);
        }
    }
    public function show(AppointmentTitle $appointmentTitle)
    {
        return view('admin.appointmentTitles.edit', compact('appointmentTitle'));
    }
    public function edit(AppointmentTitle $appointmentTitle)
    {
        //
    }
    public function update(AppointmentTitleRequest $request, AppointmentTitle $appointmentTitle)
    {
        try
        {
            // Handle file upload
            $filePath = $appointmentTitle->img;
            if ($request->hasFile('img')) {
                $filePath = updateFile(
                    $request->file('img'),
                    'at_images',
                    'atImage_',
                    $appointmentTitle->img);
            }

            $appointmentTitle->title = $request->title;
            $appointmentTitle->img = $filePath;
            $appointmentTitle->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('appointment-titles.index')->with($notification);

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

            return redirect()->route('appointment-titles.index')->with($notification);
        }
    }
    public function destroy(AppointmentTitle $appointmentTitle)
    {
        try
        {
            deleteOldFile($appointmentTitle->img);
            $appointmentTitle->delete();

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
