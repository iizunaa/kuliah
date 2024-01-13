<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Film;
use App\Models\history;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return $this->recommend();
        }
    
        return view('home.index', [
            'title' => 'Home',
            'films' => Film::latest()->get(),
        ]);
    }

    public function recommend()
    {
        $user = Auth::user();
    
        // Ambil film-film yang disukai oleh pengguna
        $likedFilmIds = $user->likes()->pluck('film_id')->toArray();
    
        // Ambil kategori film yang disukai oleh pengguna
        $likedCategories = Film::whereIn('id', $likedFilmIds)->pluck('category_id')->toArray();
    
        // Ambil pengguna lain yang memiliki film-film yang disukai mirip
        $similarUsers = User::whereHas('likes', function ($query) use ($likedFilmIds) {
            $query->whereIn('film_id', $likedFilmIds);
        })
        ->where('id', '!=', $user->id)
        ->get();
    
        // Ambil film-film yang disukai oleh pengguna lain yang memiliki kategori mirip
        $recommendedFilmIds = [];
        foreach ($similarUsers as $similarUser) {
            $similarUserLikedFilmIds = $similarUser->likes()->pluck('film_id')->toArray();
    
            // Ambil film-film dengan kategori yang mirip dengan film yang disukai oleh pengguna
            $similarUserLikedCategories = Film::whereIn('id', $similarUserLikedFilmIds)->pluck('category_id')->toArray();
            $similarCategories = array_intersect($likedCategories, $similarUserLikedCategories);
    
            $similarUserRecommendedFilmIds = Film::whereIn('category_id', $similarCategories)
                ->whereNotIn('id', $likedFilmIds)
                ->pluck('id')
                ->toArray();
    
            $recommendedFilmIds = array_merge($recommendedFilmIds, $similarUserRecommendedFilmIds);
        }
    
        $recommendedFilmIds = array_diff(array_unique($recommendedFilmIds), $likedFilmIds);
    
        // Ambil detail film-film rekomendasi
        $recommendedFilms = Film::whereIn('id', $recommendedFilmIds)->take(5)->get();
    
        return view('home.index', [
            'title' => 'Home',
            'films' => Film::latest()->get(),
            'recommendedFilms' => $recommendedFilms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $id)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $home)
    {
        return view('home.detail',[
            "title" => "detail",
            'like' => Like::where('film_id',$home->id)->count(),
            'film'=> $home,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
}
