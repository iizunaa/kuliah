<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\Request;

class DashboardFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('dashboard.films.index',[
            'films' => Film::all()->sortBy('title')
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.films.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:225',
            'tahun_terbit'=>'required',
            'sinopsis' => 'required',
            'thumbnail' => 'image',
            'link' => 'required'
        ]);
        if($request->file('thumbnail')){

            $validateData['thumbnail'] = $request->file('thumbnail')->store('film-posters');
        }

        Film::create($validateData);

        return redirect('/dashboard/films')->with('success','success upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return $film;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        
        return view('dashboard.films.edit',[
            'categories' => Category::all(),
            'film' => $film
            
        ]);
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
        $validateData = $request->validate([
            'title' => 'required|max:225',
            'category_id' => 'required',
            'thumbnail' => 'image',
            'tahun_terbit'=>'required',
            'sinopsis' => 'required',
            'link' => 'required'
        ]);
        if($request->file('thumbnail')){

            $validateData['thumbnail'] = $request->file('thumbnail')->store('film-posters');
        }

        Film::where('id', $film->id)
            ->update($validateData);

        return redirect('/dashboard/films')->with('success','Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        Film::destroy($film->id);
        return redirect('/dashboard/films')->with('success','huft, kamu menghapusnya!');
    }
}
