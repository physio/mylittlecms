<?php

namespace App\Http\Controllers;

use Backpack\PageManager\app\Models\Page;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['content'] = $page->content;
        $this->data['extras'] = $page->extras;
        $this->data['footer'] = $this->getFooterInfo();
        $this->data['news'] = $this->getLastNews();
        
        return view('pages.'.$page->template, $this->data);
    }




}
