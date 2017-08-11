<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Physio\MyLittleCMS\Models\Article;
use Physio\MyLittleCMS\Models\Office_shift;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;





    public function abort404($value = '')
    {
        abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
    }





    public function getLastNews()
    {
        return Article::where('published', 1)->where('date', '<=', time())->limit(3)->orderBy('created_at', 'desc')->get();
    }





    public function getLastHotNews()
    {
        return Article::where('published', 1)->where('date', '<=', time())->where('featured', 1)->limit(3)->orderBy('created_at', 'desc')->get();
    }





    public function getFooterInfo()
    {
        $articles = Article::select('slug', 'image')->where('published', 1)->inRandomOrder()->limit(4)->get();

        $shifts = Office_shift::orderBy('weekDay_id', 'asc')->get();

        foreach ($shifts as $row) {
            $row->start = date('H:i', strtotime("2011-01-07" . $row->start));
        }

        $infos = array(
            'news' => $articles,
            'shifts' => $shifts,
            );
        return $infos;
    }
}
