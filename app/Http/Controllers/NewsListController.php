<?php

namespace App\Http\Controllers;

use App\Models\NewsList;

class NewsListController extends Controller
{
    public function index()
    {
        $data = NewsList::all();

        return view('newslist')->with('newslists', $data);
    }

    function detail(int $id)
    {
        $data =  NewsList::find($id);

        return view('detail')->with('newslist', $data);
    }
        
}
