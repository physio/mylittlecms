<?php

namespace Physio\MyLittleCMS\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Physio\MyLittleCMS\Models\Slide;
use Physio\MyLittleCMS\Models\Presentation;
use Physio\MyLittleCMS\Models\Testimonial;
use Physio\MyLittleCMS\Models\Article;
use Physio\MyLittleCMS\Models\Service;
use Physio\MyLittleCMS\Models\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::with('category')->inRandomOrder()->limit(4)->get();
        $presentation = Presentation::where('published', 1)->with('category')->inRandomOrder()->first();
        $testimonials = Testimonial::where('published', 1)->inRandomOrder()->limit(3)->get();
        $articles = Article::where('published', 1)->with('category')->orderBy('updated_at', 'desc')->limit(3)->get();
        $articles = Article::where('published', 1)->with('category')->orderBy('updated_at', 'desc')->limit(3)->get();

        $now = new Carbon;
        $events = Event::where('dateStart', '>', $now)->where('published', true)->orderBy('dateStart', 'desc')->paginate(); 

        $activities = Service::where('published', 1)->inRandomOrder()->limit(3)->get();

        return view('vendor.MyLittleCMS.home')->with(['title' => 'Home', 'events' => $events, 'slides' => $slides, 'presentation' => $presentation, 'testimonials' => $testimonials, 'activities' => $activities, 'articles' => $articles, 'footer' => $this->getFooterInfo()]);
    }
}
