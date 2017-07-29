<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Physio\MyLittleCMS\Models\Article;
use App\Models\Activity;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;





    public function abort404($value='')
    {
        abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
    }





    public function getLastNews()
    {
        return Article::where('published', 1)->where('date' ,'<=', time())->limit(3)->orderBy('created_at', 'desc')->get();
    }





    public function getLastHotNews()
    {
        return Article::where('published', 1)->where('date' ,'<=', time())->where('featured', 1)->limit(3)->orderBy('created_at', 'desc')->get();
    }





    public function getFooterInfo()
    {
      $articles = Article::select('slug', 'image')->where('published', 1)->inRandomOrder()->limit(4)->get();


      $infos = array(
         'news' => $articles,
    	 //	'facebook'	=> $feeds,
         );
      return $infos;
  }
}