<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Blog::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('img', function($row){
                    $url = asset($row->img);
                    return '<img src="' . $url . '" alt="BG Image" loading="lazy" style="height:60px;">';
                })

                ->addColumn('title', function ($row) {
                    return ($row->title) ?? 'N/A';
                })

                ->addColumn('description', function ($row) {
                    return ($row->description) ?? 'N/A';
                })

                ->addColumn('status', function($row){
                    return '<label class="switch"><input class="' . ($row->status === 'Active' ? 'active-data' : 'decline-data') . '" id="status-update"  type="checkbox" ' . ($row->status === 'Active' ? 'checked' : '') . ' data-id="'.$row->id.'"><span class="slider round"></span></label>';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('blogs.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

                    $btn .= '&nbsp;';

                    $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                // search customization
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] != '') {
                        $searchValue = $request->search['value'];
                        $query->where(function($q) use ($searchValue) {
                            $q->where('name', 'like', "%{$searchValue}%")
                                ->orWhere('designation', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['img', 'title', 'description', 'status', 'action'])
                ->make(true);
        }

        return view('admin.blogs.index');
    }
    public function create()
    {
        return view('admin.blogs.create');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $filePath = null;
            if ($request->hasFile('img')) {
                $filePath = storeFile(
                    $request->file('img'),
                    'b_images',
                    'bImage_'
                );
            }

            $data = new Blog();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->img = $filePath;
            $data->status = 'Active';
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('blogs.index')->with($notification);

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

            return redirect()->route('blogs.index')->with($notification);
        }
    }
    public function show(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }
    public function edit(Blog $blog)
    {
        //
    }
    public function update(Request $request, Blog $blog)
    {
        try
        {
            // Handle file upload
            $filePath = $blog->img;
            if ($request->hasFile('img')) {
                $filePath = updateFile(
                    $request->file('img'),
                    'b_images',
                    'bImage_',
                    $blog->img);
            }

            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->img = $filePath;
            $blog->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('blogs.index')->with($notification);

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

            return redirect()->route('blogs.index')->with($notification);
        }
    }
    public function destroy(Blog $blog)
    {
        try
        {
            deleteOldFile($blog->img);
            $blog->delete();

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
    public function blogStatusUpdate(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $data = Blog::findorfail($request->id);
            $data->status = $request->status;
            $data->update();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Blog status updated successfully."
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
