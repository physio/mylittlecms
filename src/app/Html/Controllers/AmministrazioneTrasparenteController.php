<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Physio\MyLittleCMS\Models\TrasparentAdminItem as Item;
use Physio\MyLittleCMS\Models\TrasparentAdminDocs as Doc;
use Physio\MyLittleCMS\Models\Article;
use Backpack\PageManager\app\Models\Page;

class AmministrazioneTrasparenteController extends Controller
{
    private function orderItems($selected = '')
    {
        $elenco = Item::orderBy('depth', 'asc')->orderBy('lft', 'asc')->get();

        $list = array();
        foreach ($elenco as $row){
            if ($row->depth == 1){
                $parent = array();
                $parent['text'] = $row->title; 
                $parent['href'] = '/amministrazione-trasparente/detail/'. $row->slug ;
                if ($selected == $row->slug){
                    $parent['state'] = array('checked' => true, 'expanded' => true, 'selected' => true);
                } 
                $parent['selectable'] = 'true';
                $parent['nodes'] = array();
                foreach ($elenco as $subRow){
                    if ($subRow->parent_id == $row->id){
                        $child = array();
                        if ($selected == $subRow->slug){
                            $child['state'] =  array('checked' => true, 'expanded' => true, 'selected' => true);
                            $parent['state'] = array('expanded' => true);
                        } 
                        $child['text'] = $subRow->title;
                        $child['selectable'] = 'true';

                        $child['href'] = '/amministrazione-trasparente/detail/'. $subRow->slug ;
                        $child['icon'] = "glyphicon glyphicon-stop";
                        $child['selectedIcon'] = "glyphicon glyphicon-stop";
                        $parent['nodes'][] = $child;
                    }
                }
                $list[] = $parent;
            }
        }
        return $list;        
    }





    public function index()
    {
        $news = Article::where('published', 1)->where('featured', 1)->limit(3)->orderBy('created_at', 'desc')->get();
        $list = $this->orderItems();

        $this->data['title'] = 'Amministrazione trasparente';
        $this->data['list'] = $list;
        $this->data['extras'] = '';
        $this->data['footer'] = $this->getFooterInfo();

        return view('pages.at-elenco')->with($this->data);
    }

    public function show($slug)
    {
        $arg = Item::where('slug', $slug)->first();
        if (!$arg)
        {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'"<a>homepage</a>.');
        }

        if ($arg->depth == 1){
            $subArgs = Item::where('parent_id', $arg->id)->orderBy('lft', 'asc')->get();
        } else {
            $subArgs = array();
        }

        $docs = Doc::where('trasparentAdminItem_id', $arg->id)->orderBy('updated_at', 'desc')->get();
        $list = $this->orderItems($arg->slug);

        $data['title'] = $arg->title;
        $data['footer'] = $this->getFooterInfo();
        $data['arg'] = $arg;
        $data['subArgs'] = $subArgs;
        $data['docs'] = $docs;
        $data['news'] = $this->getLastNews();
        $data['list'] = str_replace("'", "´", json_encode($list));

        return view('pages.at-single')->with($data);
    }





    public function detail($id)
    {
        $doc = Doc::find($id)->first();
        if (!$doc)
        {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'"<a>homepage</a>.');
        }

        $list = $this->orderItems($doc->item->slug);


        $data['title'] = $doc->title;
        $data['footer'] = $this->getFooterInfo();
        $data['doc'] = $doc;
        $data['list'] = str_replace("'", "´", json_encode($list));


        return view('pages.at-doc')->with($data);
    }    
}
