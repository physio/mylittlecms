<?php

namespace App\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function show($companyName)
    {
        $provider = Provider::where('companyName', $companyName)->first();

        if (!$provider)
        {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
        }

        $data['title'] = $provider->companyName;
        $data['provider'] = $provider;
        $data['footer'] = $this->getFooterInfo();

        return view('pages.provider_single')->with($data);
    }

    public function index()
    {
        $listMajor = Provider::where('published', 1)->get();


        $data['title'] = 'I Nostri Fornitori';
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['listMajor'] = $listMajor;


        return view('pages.providers')->with($data);
    }


}
