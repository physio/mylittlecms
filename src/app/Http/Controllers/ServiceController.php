<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Physio\MyLittleCMS\Models\Service;
use Physio\MyLittleCMS\Models\Category;

class ServiceController extends Controller
{





    public function show($slug)
    {
        $list = Service::findBySlug($slug);

        if (!$article)
        {
            $this->abort404();
        }

        $data['title'] = 'Services';
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['list'] = $list;
        $data['news'] = $this->getLastNews();   


        return view('vendor.MyLittleCMS.service.single')->with($data);
    }





    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $list = Service::where('category_id', $category->id)->get();

        $news = Article::where('published', 1)->where('featured', 1)->limit(3)->orderBy('created_at', 'desc')->get();

        if (!$category)
        {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
        }

        $data['title'] = 'Services ' . $category->name;
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['list'] = $list;
        $data['category'] = $category;
        $data['news'] = $news;


        return view('vendor.MyLittleCMS.event.grid')->with($data);
    }

}
