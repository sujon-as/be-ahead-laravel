<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = AboutUs::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('img', function($row){
                    $url = asset($row->img);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('title', function ($row) {
                    return strip_tags($row->title) ?? 'N/A';
                })

                ->addColumn('description', function ($row) {
                    return strip_tags($row->description) ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('about-us.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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
                ->rawColumns(['img', 'title', 'description', 'action'])
                ->make(true);
        }

        return view('admin.aboutUs.index');
    }
    public function create()
    {
        $count = AboutUs::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You can't add more than one data",
                'alert-type' => "error",
            );

            return redirect()->route('about-us.index')->with($notification);
        }
        return view('admin.aboutUs.create');
    }
    public function store(AboutUsRequest $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $filePath = null;
            if ($request->hasFile('img')) {
                $filePath = storeFile(
                    $request->file('img'),
                    'au_images',
                    'auImage_'
                );
            }

            $data = new AboutUs();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->img = $filePath;
            $data->img_short_text = $request->img_short_text;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('about-us.index')->with($notification);

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

            return redirect()->route('about-us.index')->with($notification);
        }
    }
    public function show(AboutUs $about_u)
    {
        return view('admin.aboutUs.edit', compact('about_u'));
    }
    public function edit(AboutUs $about_u)
    {
        //
    }
    public function update(AboutUsRequest $request, AboutUs $about_u)
    {
        try
        {
            // Handle file upload
            $filePath = $about_u->img;
            if ($request->hasFile('img')) {
                $filePath = updateFile(
                    $request->file('img'),
                    'au_images',
                    'auImage_',
                    $about_u->img);
            }

            $about_u->title = $request->title;
            $about_u->description = $request->description;
            $about_u->img = $filePath;
            $about_u->img_short_text = $request->img_short_text;
            $about_u->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('about-us.index')->with($notification);

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

            return redirect()->route('about-us.index')->with($notification);
        }
    }
    public function destroy(AboutUs $about_u)
    {
        try
        {
            deleteOldFile($about_u->img);
            $about_u->delete();

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
