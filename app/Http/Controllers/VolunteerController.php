<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerRequest;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Volunteer::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('name', function ($row) {
                    return "$row->f_name $row->l_name" ?? 'N/A';
                })

                ->addColumn('email', function ($row) {
                    return $row->email ?? 'N/A';
                })

                ->addColumn('phone', function ($row) {
                    return $row->phone ?? 'N/A';
                })

                ->addColumn('image', function($row){
                    $url = asset($row->image);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('status', function($row){
                    return '<label class="switch"><input class="' . ($row->status === 'Active' ? 'active-data' : 'decline-data') . '" id="status-update"  type="checkbox" ' . ($row->status === 'Active' ? 'checked' : '') . ' data-id="'.$row->id.'"><span class="slider round"></span></label>';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    #$btn .= ' <a href="'.route('volunteers.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';
                    $btn .= '<a href="#" class="btn btn-info btn-sm view-data" data-id="'.$row->id.'"><i class="fa fa-eye"></i></a>';

                    $btn .= '&nbsp;';

                    $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                // search customization
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] != '') {
                        $searchValue = $request->search['value'];
                        $query->where(function($q) use ($searchValue) {
                            $q->where('f_name', 'like', "%{$searchValue}%")
                                ->orWhere('email', 'like', "%{$searchValue}%")
                                ->orWhere('phone', 'like', "%{$searchValue}%")
                                ->orWhere('city', 'like', "%{$searchValue}%")
                                ->orWhere('country', 'like', "%{$searchValue}%")
                                ->orWhere('l_name', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['name', 'email', 'phone', 'image', 'status', 'action'])
                ->make(true);
        }

        return view('admin.volunteers.index');
    }
    public function create()
    {
        return view('admin.volunteers.create');
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

            $data = new Volunteer();
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

            return redirect()->route('volunteers.index')->with($notification);

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

            return redirect()->route('volunteers.index')->with($notification);
        }
    }
    public function show(Volunteer $volunteer)
    {
        if (request()?->ajax()) {
            return view('admin.volunteers.view-modal', compact('volunteer'))->render();
        }
        return view('admin.volunteers.edit', compact('volunteer'));
    }
    public function edit(Volunteer $volunteer)
    {
        //
    }
    public function update(SliderRequest $request, Volunteer $volunteer)
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

            return redirect()->route('volunteers.index')->with($notification);

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

            return redirect()->route('volunteers.index')->with($notification);
        }
    }
    public function destroy(Volunteer $volunteer)
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
            $data = Volunteer::findorfail($request->id);
            $data->status = $request->status;
            $data->update();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Volunteer status updated successfully."
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
