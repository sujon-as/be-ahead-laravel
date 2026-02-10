<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Slider::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('title_1', function ($row) {
                    return $row->title_1 ?? 'N/A';
                })

                ->addColumn('title_2', function ($row) {
                    return $row->title_2 ?? 'N/A';
                })

                ->addColumn('title_3', function ($row) {
                    return $row->title_3 ?? 'N/A';
                })

                ->addColumn('bg_img', function($row){
                    $url = asset($row->bg_img);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('marker_img', function($row){
                    $url = asset($row->marker_img);
                    return '<img src="' . $url . '" alt="Marker Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('status', function($row){
                    return '<label class="switch"><input class="' . ($row->status === 'Active' ? 'active-data' : 'decline-data') . '" id="status-update"  type="checkbox" ' . ($row->status === 'Active' ? 'checked' : '') . ' data-id="'.$row->id.'"><span class="slider round"></span></label>';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('sliders.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

                    $btn .= '&nbsp;';

                    $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })

                ->rawColumns(['title_1', 'title_2', 'title_3', 'bg_img', 'marker_img', 'status', 'action'])
                ->make(true);
        }

        return view('admin.sliders.index');
    }
    public function create()
    {
        return view('admin.sliders.create');
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

            $data = new Slider();
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

            return redirect()->route('sliders.index')->with($notification);

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

            return redirect()->route('sliders.index')->with($notification);
        }
    }
    public function show(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }
    public function update(SliderRequest $request, Slider $slider)
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

            return redirect()->route('sliders.index')->with($notification);

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

            return redirect()->route('sliders.index')->with($notification);
        }
    }
    public function destroy(Slider $slider)
    {
        try
        {
            deleteOldFile($slider->bg_img);
            deleteOldFile($slider->marker_img);
            $slider->delete();

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
    public function sliderStatusUpdate(SliderRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = Slider::findorfail($request->id);
            $data->status = $request->status;
            $data->update();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Slider status updated successfully."
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
