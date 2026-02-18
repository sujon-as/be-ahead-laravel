<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Cause;
use App\Models\CauseTitle;
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
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

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
        return view('front.team');
    }

    public function volunteer()
    {
        return view('front.volunteer');
    }

    public function appointment()
    {
        return view('front.appointment');
    }

    public function donation()
    {
        return view('front.donation');
    }

    public function faq()
    {
        return view('front.faq');
    }
}
