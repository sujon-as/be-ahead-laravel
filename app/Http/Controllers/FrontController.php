<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\CauseTitle;
use App\Models\Feature;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 'Active')->get();
        $features = Feature::where('status', 'Active')->get();
        $causeTitles = CauseTitle::get();
        $causes = Cause::get();

        return view('front.index', compact(
            'sliders',
             'features',
             'causeTitles',
             'causes',
        ));
    }

    public function about()
    {
        return view('front.about');
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
