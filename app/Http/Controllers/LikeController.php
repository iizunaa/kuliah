<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function index()
    { 
        $data = Like::where('user_id', auth()->user()->id)->get();
        return view('home.historylike', [
            "title" => "Like",
            'likes' => $data
        ]);
    }
    public function like($film_id)
    {
        $like = Like::where('film_id', $film_id)->where('user_id', auth()->user()->id)->first();
        if ($like){
            $like->delete();
            return back();
        } 
        else {
            Like::create([
                'film_id' => $film_id,
                'user_id' => auth()->user()->id
            ]);
            return back();
        }
    }
}
