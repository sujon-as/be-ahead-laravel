<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryImageRequest;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GalleryImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = GalleryImage::with('category')->latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('image', function($row){
                    $url = asset($row->image);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('title', function ($row) {
                    return $row->title ?? 'N/A';
                })

                ->addColumn('category', function ($row) {
                    return $row->category?->title ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('gallery-images.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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
                ->rawColumns(['image', 'title', 'category', 'action'])
                ->make(true);
        }

        return view('admin.galleryImages.index');
    }
    public function create()
    {
        $categories = GalleryCategory::get();
        return view('admin.galleryImages.create', compact('categories'));
    }
    public function store(GalleryImageRequest $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $filePath = null;
            if ($request->hasFile('image')) {
                $filePath = storeFile(
                    $request->file('image'),
                    'gallery_images',
                    'galleryImage_'
                );
            }

            $data = new GalleryImage();
            $data->title = $request->title;
            $data->gallery_category_id = $request->gallery_category_id;
            $data->image = $filePath;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('gallery-images.index')->with($notification);

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

            return redirect()->route('gallery-images.index')->with($notification);
        }
    }
    public function show(GalleryImage $gallery_image)
    {
        $categories = GalleryCategory::get();
        return view('admin.galleryImages.edit', compact('gallery_image', 'categories'));
    }
    public function edit(GalleryImage $galleryImage)
    {
        //
    }
    public function update(GalleryImageRequest $request, GalleryImage $galleryImage)
    {
        try
        {
            // Handle file upload
            $filePath = $galleryImage->image;
            if ($request->hasFile('image')) {
                $filePath = updateFile(
                    $request->file('image'),
                    'gallery_images',
                    'galleryImage_',
                    $galleryImage->image);
            }

            $galleryImage->title = $request->title;
            $galleryImage->gallery_category_id = $request->gallery_category_id;
            $galleryImage->image = $filePath;
            $galleryImage->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('gallery-images.index')->with($notification);

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

            return redirect()->route('gallery-images.index')->with($notification);
        }
    }
    public function destroy(GalleryImage $galleryImage)
    {
        try
        {
            deleteOldFile($galleryImage->image);
            $galleryImage->delete();

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
