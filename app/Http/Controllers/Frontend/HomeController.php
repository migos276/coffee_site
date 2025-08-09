<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use App\Models\Practice;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index() {
        $practices = Cache::remember('front:practices:home', 600, fn() => Practice::orderBy('order')->take(9)->get());
        $lawyers = Cache::remember('front:lawyers:home', 600, fn() => Lawyer::where('status', true)->orderBy('last_name')->take(6)->get());
        return view('frontend.pages.home', compact('practices','lawyers'));
    }

    public function practices() {
        $practices = Practice::orderBy('order')->paginate(12);
        return view('frontend.pages.practices-index', compact('practices'));
    }

    public function practiceShow(Practice $practice) {
        $practice->load('lawyers');
        return view('frontend.pages.practice-show', compact('practice'));
    }

    public function team() {
        $lawyers = Lawyer::where('status', true)->with('practices')->paginate(12);
        return view('frontend.pages.team', compact('lawyers'));
    }
}