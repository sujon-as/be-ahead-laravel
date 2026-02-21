<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Appointment::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('name', function ($row) {
                    return $row->name ?? 'N/A';
                })

                ->addColumn('email', function ($row) {
                    return $row->email ?? 'N/A';
                })

                ->addColumn('phone', function ($row) {
                    return $row->phone ?? 'N/A';
                })

                ->addColumn('date', function ($row) {
                    return Carbon::parse($row->date)->format('Y-m-d H:i');
                })

                ->addColumn('message', function ($row) {
                    return $row->message ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    #$btn .= ' <a href="'.route('appointments.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';
                    $btn .= '<a href="#" class="btn btn-info btn-sm view-data" data-id="'.$row->id.'"><i class="fa fa-eye"></i></a>';

                    $btn .= '&nbsp;';

                    #$btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                // search customization
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] != '') {
                        $searchValue = $request->search['value'];
                        $query->where(function($q) use ($searchValue) {
                            $q->where('name', 'like', "%{$searchValue}%")
                                ->orWhere('email', 'like', "%{$searchValue}%")
                                ->orWhere('phone', 'like', "%{$searchValue}%")
                                ->orWhere('date', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['name', 'email', 'phone', 'date', 'message', 'action'])
                ->make(true);
        }

        return view('admin.appointments.index');
    }
    public function create()
    {
        return view('admin.appointments.create');
    }
    public function store(SliderRequest $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $bgFilePath = null;
            if ($request->hasFile('bg_img')) {
                $bgFilePath = storeFile($request->file('bg_img'), 'bg_images', 'bgImage_');
            }

            $markerFilePath = null;
            if ($request->hasFile('marker_img')) {
                $markerFilePath = storeFile($request->file('marker_img'), 'marker_images', 'markerImage_');
            }

            $data = new Appointment();
            $data->title_1 = $request->title_1;
            $data->title_2 = $request->title_2;
            $data->title_3 = $request->title_3;
            $data->bg_img = $bgFilePath;
            $data->marker_img = $markerFilePath;
            $data->status = $request->status;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('appointments.index')->with($notification);

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

            return redirect()->route('appointments.index')->with($notification);
        }
    }
    public function show(Appointment $appointment)
    {
        if (request()?->ajax()) {
            return view('admin.appointments.view-modal', compact('appointment'))->render();
        }
        return view('admin.appointments.edit', compact('appointment'));
    }
    public function edit(Appointment $appointment)
    {
        //
    }
    public function update(SliderRequest $request, Appointment $appointment)
    {
        try
        {
            // Handle file upload
            $bgFilePath = $slider->bg_img;
            if ($request->hasFile('bg_img')) {
                $bgFilePath = updateFile($request->file('bg_img'), 'bg_images', 'bgImage_', $slider->bg_img);
            }

            $markerFilePath = $slider->marker_img;
            if ($request->hasFile('marker_img')) {
                $markerFilePath = updateFile($request->file('marker_img'), 'marker_images', 'markerImage_', $slider->marker_img);
            }

            $slider->title_1 = $request->title_1;
            $slider->title_2 = $request->title_2;
            $slider->title_3 = $request->title_3;
            $slider->bg_img = $bgFilePath;
            $slider->marker_img = $markerFilePath;
            $slider->status = $request->status;
            $slider->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('appointments.index')->with($notification);

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

            return redirect()->route('appointments.index')->with($notification);
        }
    }
    public function destroy(Appointment $appointment)
    {
        try
        {
            deleteOldFile($volunteer->image);
            $volunteer->delete();

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
    public function volunteerStatusUpdate(VolunteerRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = Appointment::findorfail($request->id);
            $data->status = $request->status;
            $data->update();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Appointment status updated successfully."
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
