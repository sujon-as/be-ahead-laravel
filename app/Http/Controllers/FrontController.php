<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Cause;
use App\Models\CauseTitle;
use App\Models\Feature;
use App\Models\Gallery;
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
        ));
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
        return view('front.gallery');
    }

    public function team()
    {
        return view('front.team');
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
