<?php

namespace physio\mylittlecms\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::findBySlug($slug);
        $news = Article::where('published', 1)->where('featured', 1)->limit(3)->orderBy('created_at', 'desc')->get();

        if (!$article)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        return view('pages.news-single')->with(['title' => $article->title, 'news' => $news, 'article' => $article, 'footer' => $this->getFooterInfo()]);
    }

    public function index()
    {
        $list = Article::where('published', 1)->where('date' ,'<=', time())->paginate();
        if (!$list)
        {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
        }        

        $data['title'] = 'Notizie';
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['list'] = $list;
        $data['news'] = $this->getLastNews();        

        return view('pages.article-grid')->with($data);
    }    


}
