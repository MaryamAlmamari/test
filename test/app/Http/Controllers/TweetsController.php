<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TweetsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function timeline()
    {
        $data['tweets']= Tweet::all();
        return view('tweets.timeline',$data);
    }

    public function createTweet(Request $request)
    {
           //return $request;
            $tweet = new Tweet();
            $tweet->content = $request->tweet_content;
            $tweet->content = Auth::user()->id;
            $tweet->save();
            return back();
    }
}
