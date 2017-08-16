<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use Physio\MyLittleCMS\Models\Provider;

class ProviderController extends Controller
{
    public function show($companyName)
    {
        $provider = Provider::where('companyName', $companyName)->first();

        if (!$provider)
        {
            $this->abort404();
        }

        $data['title'] = $provider->companyName;
        $data['provider'] = $provider;
        $data['footer'] = $this->getFooterInfo();

        return view('vendor.MyLittleCMS.provider.single')->with($data);
    }

    public function index()
    {
        $listMajor = Provider::where('published', 1)->get();

        $data['title'] = 'I Nostri Fornitori';
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['listMajor'] = $listMajor;

        return view('vendor.MyLittleCMS.article.grid')->with($data);
    }


}
