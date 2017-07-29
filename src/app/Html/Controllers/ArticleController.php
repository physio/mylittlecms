<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Physio\MyLittleCMS\Models\Article;

class ArticleController extends Controller
{




    
    public function show($slug)
    {
        $article = Article::findBySlug($slug);
        $news = Article::where('published', 1)->where('featured', 1)->limit(3)->orderBy('created_at', 'desc')->get();

        if (!$article)
        {
            $this->abort404();
        }

        return view('pages.news-single')->with(['title' => $article->title, 'news' => $news, 'article' => $article, 'footer' => $this->getFooterInfo()]);
    }





    public function index()
    {
        $list = Article::where('published', 1)->where('date' ,'<=', time())->paginate();
        if (!$list)
        {
            $this->abort404();
        }        

        $data['title'] = 'Notizie';
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['list'] = $list;
        $data['news'] = $this->getLastNews();        

        return view('vendor.MyLittleCMS.article.grid')->with($data);
    }    


}
