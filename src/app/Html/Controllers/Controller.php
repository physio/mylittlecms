<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Article;
use App\Models\Activity;
use Feeds;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
    	 $feed = Feeds::make('http://www.maerco.it/rss_from_fb/?pageid=548624975150553');
    	     $feeds = array(
		      'title'     => $feed->get_title(),
		      'permalink' => $feed->get_permalink(),
		      'items'     => $feed->get_items(),
		    );  

    	 $infos = array(
    	 	'news' => $articles,
    	 //	'facebook'	=> $feeds,
    	 	);
    	 return $infos;
    }
}