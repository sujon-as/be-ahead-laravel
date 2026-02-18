<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryCategoryRequest;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GalleryCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = GalleryCategory::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('title', function ($row) {
                    return $row->title ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('gallery-categories.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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
                ->rawColumns(['title', 'action'])
                ->make(true);
        }

        return view('admin.galleryCategories.index');
    }
    public function create()
    {
        return view('admin.galleryCategories.create');
    }
    public function store(GalleryCategoryRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new GalleryCategory();
            $data->title = $request->title;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('gallery-categories.index')->with($notification);

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

            return redirect()->route('gallery-categories.index')->with($notification);
        }
    }
    public function show(GalleryCategory $gallery_category)
    {
        return view('admin.galleryCategories.edit', compact('gallery_category'));
    }
    public function edit(GalleryCategory $gallery_category)
    {
        //
    }
    public function update(GalleryCategoryRequest $request, GalleryCategory $gallery_category)
    {
        try
        {

            $gallery_category->title = $request->title;
            $gallery_category->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('gallery-categories.index')->with($notification);

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

            return redirect()->route('gallery-categories.index')->with($notification);
        }
    }
    public function destroy(GalleryCategory $gallery_category)
    {
        try
        {
            $gallery_category->delete();

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
