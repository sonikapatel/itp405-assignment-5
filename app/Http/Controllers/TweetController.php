<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Tweet;
class TweetController extends Controller
{
    public function index()
    {
        // $tweets = DB::table('tweets')
        //     ->select('tweets.id', 'tweet')
        //     ->orderBy('id','DESC')
        //     ->get();
        $tweets = Tweet::orderBy('id', 'desc')->get();
        return view('songs.index', [
            'tweets' => $tweets
        ]);
    }
    public function viewID($tweetID)
    {
        // $tweets = DB::table('tweets')
        //     ->select('tweets.id', 'tweet')
        //     ->where('id', '=', $tweet)
        //     ->get();
        $tweet = Tweet::find($tweetID);
        return view('songs.view', [
            'tweet' => $tweet
        ]);
    }

    // public function create()
    // {
    //     $artists = DB::table('tweets')
    //         ->select('tweets.id', 'tweet')
    //         ->get();
    //
    //     return view('songs.create', [
    //         'artists' => $artists
    //     ]);
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tweet' => 'required|max:140'
        ]);

        if ($validator->passes()) {
            // DB::table('tweets')->insert([
            //     'tweet' => request('tweet')
            // ]);

            $tweet = new Tweet();
            $tweet->tweet = request('tweet');
            $tweet->save();

            return redirect('/')
                ->with('successStatus', 'Tweet created successfully!');
        } else {
            return redirect('/')
            ->withErrors($validator);

        }
    }

    public function destroy($tweet)
    {
        // DB::table('tweets')
        //     ->where('id', '=', $songID)
        //     ->delete();
        $tweet = Tweet::find($tweet);
        $tweet->delete();

        return redirect('/')
            ->with('successStatus', 'Tweet deleted successfully!');
    }

    public function edit($tweetID)
    {
        // $song = DB::table('songs')
        //     ->where('id', '=', $songID)
        //     ->first();
        //
        // $artists = DB::table('artists')
        //     ->select('id', 'artist_name')
        //     ->orderBy('artist_name')
        //     ->get();
        //
        // return view('songs.edit', [
        //     'artists' => $artists,
        //     'song' => $song
        // ]);
        $tweet = Tweet::find($tweetID);
        return view('songs.edit', [
          'tweet' => $tweet
        ]);
    }
    //
    public function update($tweetID)
    {
        $validator = Validator::make([
          'tweet' =>request('tweet')],
          ['tweet' => 'required|max:140'
        ]);

        // $validator = Validator::make($request->all(), [
        //     'tweet' => 'required|max:140'
        // ]);

        if ($validator->passes()) {
            $tweet = Tweet::find($tweetID);
            $tweet->tweet = request('tweet');
            $tweet->save();
    //
            return redirect('/')
                ->with('successStatus', 'Tweet updated successfully!');
        } else {
            return redirect("/tweets/$tweetID/edit")
              ->withInput()
              ->withErrors($validator);
        }
}
}
