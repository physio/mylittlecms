<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use App\Models\Activity;
use App\Models\Teammember;

class TeamMemberController extends Controller
{
    public function index($surname, $name)
    {
        $member = Teammember::where('surname', $surname)->where('name', $name)->first();

        if (!$member)
        {
            abort(404, 'Per favore torna alla nostra <a href="'.url('').'">homepage</a>.');
        }

        $data['title'] = $member->full_name;
        $data['member'] = $member;
        $data['footer'] = $this->getFooterInfo();

        return view('pages.member_single')->with($data);
    }

    public function elenco()
    {
        $listMajor = Teammember::where('published', 1)->where('major', 1)->get();
        $listMinor = Teammember::where('published', 1)->where('major', 0)->get();

        $data['title'] = 'I Membri del Nostro Team ';
        $data['content'] = '';
        $data['extras'] = '';
        $data['footer'] = $this->getFooterInfo();
        $data['listMajor'] = $listMajor;
        $data['listMinor'] = $listMinor;

        return view('pages.team_members')->with($data);
    }


}
