<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\VolunteerRequest;
use App\Models\AboutUs;
use App\Models\Appointment;
use App\Models\AppointmentTitle;
use App\Models\Award;
use App\Models\AwardTitle;
use App\Models\Cause;
use App\Models\CauseTitle;
use App\Models\Faq;
use App\Models\FaqTitle;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use App\Models\Mission;
use App\Models\MissionTitle;
use App\Models\Project;
use App\Models\ProjectTitle;
use App\Models\RecentCause;
use App\Models\RecentCauseTitle;
use App\Models\Slider;
use App\Models\Volunteer;
use App\Models\WhyChooseUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 'Active')->get();
        $features = Feature::where('status', 'Active')->get();
        $causeTitles = CauseTitle::get();
        $causes = Cause::get();
        $recentCauseTitles = RecentCauseTitle::first();
        $recentCauses = RecentCause::get();
        $whyChooseUs = WhyChooseUs::first();
        $aboutUs = AboutUs::first();
        $gallery = Gallery::first();
        $galleryCategories = GalleryCategory::get();
        $missionTitle = MissionTitle::first();
        $missions = Mission::get();
        $projectTitle = ProjectTitle::first();
        $projects = Project::get();
        $volunteers = Volunteer::where('status', 'Active')->get();
        $awardTitle = AwardTitle::first();
        $awards = Award::get();

        return view('front.index', compact(
            'sliders',
             'features',
             'causeTitles',
             'causes',
             'recentCauseTitles',
             'recentCauses',
             'whyChooseUs',
             'aboutUs',
             'gallery',
             'galleryCategories',
             'missionTitle',
             'missions',
             'projectTitle',
             'projects',
             'volunteers',
             'awardTitle',
             'awards',
        ));
    }
    public function homeGalleryAll()
    {
        $images = GalleryImage::with('category')->get();
        return view('front.partials.home-gallery-items', compact('images'));
    }

    public function homeGalleryByCategory($id)
    {
        $images = GalleryImage::with('category')
            ->where('gallery_category_id', $id)
            ->get();

        return view('front.partials.home-gallery-items', compact('images'));
    }

    public function about()
    {
        $aboutUs = AboutUs::first();
        return view('front.about', compact('aboutUs'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function causes()
    {
        return view('front.causes');
    }

    public function events()
    {
        return view('front.events');
    }

    public function gallery()
    {
        $gallery = Gallery::first();
        $galleryCategories = GalleryCategory::get();

        return view('front.gallery', compact('gallery', 'galleryCategories'));
    }

    public function team()
    {
        $volunteers = Volunteer::where('status', 'Active')->get();
        return view('front.team', compact('volunteers'));
    }

    public function volunteer()
    {
        return view('front.volunteer');
    }

    public function appointment()
    {
        $faqTitle = FaqTitle::first();
        $faqs = Faq::get();
        $awardTitle = AwardTitle::first();
        $volunteers = Volunteer::where('status', 'Active')->get();
        $appointmentTitle = AppointmentTitle::first();
        return view('front.appointment', compact(
            'faqTitle',
            'faqs',
            'volunteers',
            'appointmentTitle',
            'awardTitle'
        ));
    }

    public function donation()
    {
        $causeTitles = CauseTitle::get();
        $causes = Cause::get();
        return view('front.donation', compact('causes', 'causeTitles'));
    }

    public function faq()
    {
        $faqTitle = FaqTitle::first();
        $faqs = Faq::get();
        return view('front.faq', compact('faqTitle', 'faqs'));
    }

    public function volunteerReg(VolunteerRequest $request)
    {
        DB::beginTransaction();
        try
        {
            // Handle file upload
            $filePath = null;
            if ($request->hasFile('image')) {
                $filePath = storeFile(
                    $request->file('image'),
                    'vr_images',
                    'vrImage_'
                );
            }

            $data = new Volunteer();
            $data->f_name = $request->f_name;
            $data->l_name = $request->l_name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->address = $request->address;
            $data->city = $request->city;
            $data->state = $request->state;
            $data->zip = $request->zip;
            $data->country = $request->country;
            $data->image = $filePath;
            $data->status = 'Inactive';
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Registration Successfully, Please wait for admin approval.",
                'alert-type' => "success",
            );

            return redirect()->route('volunteer')->with($notification);

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

            return redirect()->route('volunteer')->with($notification);
        }
    }
    public function appointmentSubmit(AppointmentRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $data = new Appointment();
            $data->name = trim($request->name);
            $data->email = trim($request->email);
            $data->phone = trim($request->phone);
            $data->date = trim($request->date);
            $data->message = trim($request->message);
            $data->save();

            DB::commit();

            $notification=array(
                'message' => "Appointment submitted Successfully, Please wait for admin response.",
                'alert-type' => "success",
            );

            return redirect()->route('appointment')->with($notification);

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

            return redirect()->route('appointment')->with($notification);
        }
    }
}
