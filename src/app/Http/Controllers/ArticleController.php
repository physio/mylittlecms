<?php
namespace Physio\MyLittleCMS\Http\Controllers;
use Physio\MyLittleCMS\Models\Article;
class ArticleController extends Controller
{
    
    public function show($slug)
    {
        $article = Article::findBySlug($slug);
        if (!$article)
        {
            $this->abort404();
        }
        $data['title'] = 'Notizie';
        $data['content'] = '';
        $data['article'] = $article;
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['news'] = $this->getLastNews();   
        return view('vendor.MyLittleCMS.article.single')->with($data);
    }
    public function index()
    {
        $list = Article::where('published', 1)->where('date' ,'>=', time())->paginate();
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