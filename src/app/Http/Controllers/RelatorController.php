<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use Physio\MyLittleCMS\Models\Event;
use Physio\MyLittleCMS\Models\Relator;

class RelatorController extends Controller
{
    public function show($surname, $name)
    {
        $relator = Relator::where('surname', $surname)->where('name', $name)->first();

        if (!$relator)
        {
            $this->abort404();
        }

        $data['title'] = $relator->full_name;
        $data['relator'] = $relator;
        $data['footer'] = $this->getFooterInfo();

        return view('vendor.MyLittleCMS.relator.single')->with($data);
    }

    public function index()
    {
        $list = Relator::where('published', 1)->get();


        $data['title'] = 'I Relatori';
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['list'] = $list;

        return view('vendor.MyLittleCMS.relator.grid')->with($data);
    }


}
