<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;
use Exception;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Faq::latest();

            return DataTables::of($sliders)
                ->addIndexColumn()

                ->addColumn('question', function ($row) {
                    return ($row->question) ?? 'N/A';
                })

                ->addColumn('answer', function ($row) {
                    return ($row->answer) ?? 'N/A';
                })

                ->addColumn('action', function($row){

                    $btn = "";
                    $btn .= '&nbsp;';

                    $btn .= ' <a href="'.route('faqs.show',$row->id).'" class="btn btn-primary btn-sm action-button edit-data" data-id="'.$row->id.'"><i class="fa fa-edit"></i></a>';

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
                ->rawColumns(['question', 'answer', 'action'])
                ->make(true);
        }

        return view('admin.faqs.index');
    }
    public function create()
    {
        return view('admin.faqs.create');
    }
    public function store(FaqRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new Faq();
            $data->question = trim($request->question);
            $data->answer = trim($request->answer);
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Successfully data has been added",
                'alert-type' => "success",
            );

            return redirect()->route('faqs.index')->with($notification);

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

            return redirect()->route('faqs.index')->with($notification);
        }
    }
    public function show(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }
    public function edit(Faq $faq)
    {
        //
    }
    public function update(FaqRequest $request, Faq $faq)
    {
        try
        {
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->update();

            $notification=array(
                'message' => "Successfully data has been updated",
                'alert-type' => "success",
            );

            return redirect()->route('faqs.index')->with($notification);

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

            return redirect()->route('faqs.index')->with($notification);
        }
    }
    public function destroy(Faq $faq)
    {
        try
        {
            $faq->delete();

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
