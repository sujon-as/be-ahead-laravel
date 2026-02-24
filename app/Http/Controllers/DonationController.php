<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Donation::latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('name', function ($row) {
                    return "$row->f_name $row->l_name" ?? 'N/A';
                })

                ->addColumn('amount', function ($row) {
                    return $row->amount ?? 'N/A';
                })

                ->addColumn('email', function ($row) {
                    return $row->email ?? 'N/A';
                })

                ->addColumn('phone', function ($row) {
                    return $row->phone ?? 'N/A';
                })

                ->addColumn('image', function($row){
                    $url = asset($row->img);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    #$btn .= ' <a href="'.route('donations.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';
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
                ->rawColumns(['name','amount', 'email', 'phone', 'image', 'action'])
                ->make(true);
        }

        return view('admin.donations.index');
    }
    public function create()
    {
        return view('admin.donations.create');
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

            $data = new Donation();
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

            return redirect()->route('donations.index')->with($notification);

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

            return redirect()->route('donations.index')->with($notification);
        }
    }
    public function show(Donation $donation)
    {
        if (request()?->ajax()) {
            return view('admin.donations.view-modal', compact('donation'))->render();
        }
        return view('admin.donations.edit', compact('donation'));
    }
    public function edit(Donation $donation)
    {
        //
    }
    public function update(SliderRequest $request, Donation $donation)
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

            return redirect()->route('donations.index')->with($notification);

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

            return redirect()->route('donations.index')->with($notification);
        }
    }
    public function destroy(Donation $donation)
    {
        try
        {
            deleteOldFile($donation->img);
            $donation->delete();

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
            $data = Donation::findorfail($request->id);
            $data->status = $request->status;
            $data->update();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Donation status updated successfully."
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
