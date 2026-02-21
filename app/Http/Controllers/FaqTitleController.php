<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqTitleRequest;
use App\Models\FaqTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;
use Exception;

class FaqTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = FaqTitle::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('title_1', function ($row) {
                    return strip_tags($row->title_1) ?? 'N/A';
                })

                ->addColumn('title_2', function ($row) {
                    return strip_tags($row->title_2) ?? 'N/A';
                })

                ->addColumn('yt_video_link', function ($row) {
                    return $row->yt_video_link ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('faq-titles.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

                    $btn .= '&nbsp;';

                    $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-data action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                // search customization
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] != '') {
                        $searchValue = $request->search['value'];
                        $query->where(function($q) use ($searchValue) {
                            $q->where('title_1', 'like', "%{$searchValue}%")
                                ->orWhere('title_2', 'like', "%{$searchValue}%")
                                ->orWhere('yt_video_link', 'like', "%{$searchValue}%");
                        });
                    }
                })
                ->rawColumns(['title_1', 'title_2', 'yt_video_link', 'action'])
                ->make(true);
        }

        return view('admin.faqTitles.index');
    }
    public function create()
    {
        $count = FaqTitle::count();
        if($count >= 1) {
            $notification=array(
                'message' => "You can't add more than one data",
                'alert-type' => "error",
            );

            return redirect()->route('faq-titles.index')->with($notification);
        }
        return view('admin.faqTitles.create');
    }
    public function store(FaqTitleRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new FaqTitle();
            $data->title_1 = $request->title_1;
            $data->title_2 = $request->title_2;
            $data->yt_video_link = $request->yt_video_link;
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('faq-titles.index')->with($notification);

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

            return redirect()->route('faq-titles.index')->with($notification);
        }
    }
    public function show(FaqTitle $faqTitle)
    {
        return view('admin.faqTitles.edit', compact('faqTitle'));
    }
    public function edit(FaqTitle $faqTitle)
    {
        //
    }
    public function update(FaqTitleRequest $request, FaqTitle $faqTitle)
    {
        try
        {
            $faqTitle->title_1 = $request->title_1;
            $faqTitle->title_2 = $request->title_2;
            $faqTitle->yt_video_link = $request->yt_video_link;
            $faqTitle->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('faq-titles.index')->with($notification);

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

            return redirect()->route('faq-titles.index')->with($notification);
        }
    }
    public function destroy(FaqTitle $faqTitle)
    {
        try
        {
            $faqTitle->delete();

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
