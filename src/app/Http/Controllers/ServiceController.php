<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Carbon\Carbon;

use Backpack\PageManager\app\Models\Page;

use Physio\MyLittleCMS\Models\Service;
use Physio\MyLittleCMS\Models\Category;
use App\Models\Shift;
use App\Models\Round;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $page = Service::findBySlug($slug);

        if (!$page) {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
        }

        $this->data['title'] = $page->title;

        $corsi = Shift::where('categoria', $page->objectId)->where('endDate', '>', Carbon::today())->get();

        $sortedCorsi = $corsi->sortBy(function($shift) {
            return (int) $shift->ordine;
        });



        $categoria = $page->objectId;
        $max = Round::whereHas('shift', function ($query) use ($categoria) {
            $query->where('categoria', $categoria);
        })->where('stop', '>', Carbon::yesterday())->max('stop');

        if ($max != null) {
            $maxtime = Carbon::createFromFormat('Y-m-d H:i:s', $max)->addHours(2);
            if ($maxtime->minute > 30) {
                $maxtime->minute = 0;
                $maxtime->hour = $maxtime->hour +1;
            } else {
                $maxtime->minute = 0;
            }
            $dividi = explode(" ", $maxtime);
            $maxHour = $dividi[1];
        } else {
            $maxHour = "23:00:00";
        }


        $min = Round::whereHas('shift', function ($query) use ($categoria) {
            $query->where('categoria', $categoria);
        })->where('stop', '>', Carbon::yesterday())->min('start');

        if ($max != null) {
            $mintime = Carbon::createFromFormat('Y-m-d H:i:s', $min)->subHours(2);
            if ($mintime->minute > 30) {
                $mintime->minute = 0;
                $mintime->hour = $mintime->hour +1;
            } else {
                $mintime->minute = 0;
            }
            $dividi = explode(" ", $mintime);
            $minHour = $dividi[1];
        } else {
            $minHour = "07:00:00";
        }

        $data['content'] = $page->content;
        $data['extras'] = $page->extras;
        $data['footer'] = $this->getFooterInfo();
        $data['data'] = $page;
        $data['service'] = $page;
        $data['corsi'] = $sortedCorsi;
        $data['minHour'] = $minHour;
        $data['maxHour'] = $maxHour;

        return view('vendor.MyLittleCMS.service.single')->with($data);
    }





    public function category($title)
    {
        $category = Category::where('name', $title)->first();
        if (!$category) {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
        }

        $list = Service::where('category_id', $category->id)->get();

        if (!$list) {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
        }

        $data['title'] = 'Attività ' . $category->name;
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['list'] = $list;
        $data['category'] = $category;

        return view('vendor.MyLittleCMS.service.grid')->with($data);
    }

    public function getEventsCategory(Request $request, $categoria)
    {
        $events = Round::whereHas('shift', function ($query) use ($categoria) {
            $query->where('categoria', $categoria)
            ->where('startDate', '>=', $request->input('start'))
            ->where('endDate', '<=', $request->input('end'));
        })->where('stop', '>', Carbon::yesterday())->get();

        // $events = Round::where('id' , '!=', 3)->get();


        $input = array();
        foreach ($events as $event) {

            $riga = array();
            $riga['id'] = $event->id;
            $riga['start'] = $event->getStart();
            $riga['end'] = $event->getend();
            $riga['title'] = $event->getTitle();
            $riga['allDay'] = false;
            $riga['description'] = $event->getDescription();
            $riga['editable'] = false;
            // $riga['backgroundColor'] = $event->getBackgroundColor();
            $input[] = $riga;
        }
        return response()->json($input);
    }


    public function getEventsNow($now = 'DATE(NOW())')
    {
        date_default_timezone_set('Europe/Rome');
        $now = date('Y-m-d h:i:s', time());

        $rounds = Round::where('start', '<', $now)->where('stop', '>', $now)->get();

        $list = array();
        foreach ($rounds as $round) {

            $riga = array();
            $riga['start'] = $round->shift->orarioInizio;
            $riga['end'] = $round->shift->orarioFine;
            $riga['title'] = $round->getTitle();
            $riga['description'] = $round->getDescription();
            //   $riga['df'] = $round->shift->getFasciaEta();
            // $riga['backgroundColor'] = $event->getBackgroundColor();
            $list[] = $riga;
        }

        return response()->json($list);
    }
}
