<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        return view('follows.index', [
            'title' => 'フォロー一覧',
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
    public function followerIndex($id)
    {
        //
        return view('follows.follower_index', [
            'title' => 'フォロワー一覧',
          ]);
    }
}
