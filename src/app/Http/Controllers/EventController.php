<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use Physio\MyLittleCMS\Models\Event;
use Physio\MyLittleCMS\Models\Category;
use Physio\MyLittleCMS\Models\Article;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index($eventState = 'prossimi')
    {        
        $now = new Carbon;
        $now = $now->toDateTimeString();

        if ($eventState == 'prossimi'){
            $list = Event::where('dateStart', '>', $now)->where('published', true)->orderBy('dateStart', 'desc')->paginate();            
        } else {
            $list = Event::where('published', true)->orderBy('dateStart', 'desc')->paginate();
        }
        

        if (!$list)
        {
            $this->abort404();
        }

        $data['title'] = ($eventState == 'prossimi')? 'Elenco Prossimi Eventi' : 'Elenco tutti Eventi';
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['list'] = $list;
        //$data['category'] = $category;
        $data['news'] = $this->getLastNews();

        return view('vendor.MyLittleCMS.event.grid')->with($data);
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->first();

        if (!$event)
        {
            $this->abort404();
        }

        $now = new Carbon;
        $now = $now->toDateTimeString();

        $data['title'] = $event->title;
        $data['now'] = $now;
        $data['footer'] = $this->getFooterInfo();
        $data['event'] = $event;
        $data['news'] = $this->getLastNews();

        return view('vendor.MyLittleCMS.event.single')->with($data);
    }
}
