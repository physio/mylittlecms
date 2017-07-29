<?php

namespace App\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use App\Models\Slide;

class SpecialController extends Controller
{
    public function index($slug)
    {
        $page = Slide::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['content'] = $page->content;
        $this->data['extras'] = $page->extras;
        $this->data['footer'] = $this->getFooterInfo();

        return view('pages.article')->with(['article' => $page, 'footer' => $this->getFooterInfo()]);
    }




}
