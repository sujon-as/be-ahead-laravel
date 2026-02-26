<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = News::latest();

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

                    $btn .= ' <a href="'.route('news.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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

        return view('admin.news.index');
    }
    public function create()
    {
        return view('admin.news.create');
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
                    'n_images',
                    'nImage_'
                );
            }

            $data = new News();
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

            return redirect()->route('news.index')->with($notification);

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

            return redirect()->route('news.index')->with($notification);
        }
    }
    public function show(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }
    public function edit(News $news)
    {
        //
    }
    public function update(Request $request, News $news)
    {
        try
        {
            // Handle file upload
            $filePath = $news->img;
            if ($request->hasFile('img')) {
                $filePath = updateFile(
                    $request->file('img'),
                    'n_images',
                    'nImage_',
                    $news->img);
            }

            $news->title = $request->title;
            $news->description = $request->description;
            $news->img = $filePath;
            $news->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('news.index')->with($notification);

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

            return redirect()->route('news.index')->with($notification);
        }
    }
    public function destroy(News $news)
    {
        try
        {
            deleteOldFile($news->img);
            $news->delete();

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
    public function newsStatusUpdate(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $data = News::findorfail($request->id);
            $data->status = $request->status;
            $data->update();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "News status updated successfully."
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
