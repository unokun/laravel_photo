<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    public function index()
    {
        //
        return view('likes.index', [
            'title' => 'いいね一覧',
          ]);
    }
    public function store(Request $request)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
