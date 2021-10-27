<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\new_upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InputMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $api_key = "5bfab28bfcd4ef02d39eec1dfbd6a264";
        $query = request('search');
        $search_mov = [];
        if (!empty($query)) {
            $search_mov = Http::get("https://api.themoviedb.org/3/search/movie?api_key=$api_key&query=$query")
        ->json()['results'];
        }

        return view('admin_input_movies',[
            'movies' => $search_mov,
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
    public function store(Request $request)
    {
        $request->validate([
            'id_movies'=>'required|numeric',
            'Judul'=>'required',
            'poster_path'=>'required',
            'backdroph_path'=>'required',
            'vote_average'=>'required',
            'link_video'=>'required',
            'resolution'=>'required',
        ]);
        $input_newupload = new new_upload;
        $input_newupload->id_newupload = $request->id_movies;
        $input_newupload->status = $request->status;
        $input_newupload->backdroph = $request->backdroph_path;
        $input_newupload->poster_path = $request->poster_path;
        $input_newupload->vote_average = $request->vote_average;
        $input_newupload->Judul = $request->Judul;
        $input_newupload->resolution = $request->resolution;

        $input_movies = new Movie;
        $input_movies->id_movies = $request->id_movies;
        $input_movies->link_video = $request->link_video;

        if ($input_movies->save()&&$input_newupload->save()) {
            return redirect()->back()->with('sucsess', 'Data Berhasil Disimpan');
        }else{
            return redirect()->back()->with('fail', 'Data gagal Ditambahkan');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
