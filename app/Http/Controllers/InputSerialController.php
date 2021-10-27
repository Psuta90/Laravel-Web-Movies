<?php

namespace App\Http\Controllers;

use App\Models\Serial_TV;
use App\Models\new_upload;
use App\Models\Seasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InputSerialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $api_key = "5bfab28bfcd4ef02d39eec1dfbd6a264";
        $page = 1;
        $query = request('search');
        $search_mov=[];
        if (!empty($query)) {
            $search_mov = Http::get("https://api.themoviedb.org/3/search/tv?api_key=$api_key&query=$query")
        ->json()['results'];
        }

        return view('admin_input_serial', [
            'serial' => $search_mov,
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
        if (!empty($request->form)) {
            $request->validate([
                'id_serial'=>'required|numeric',
                'id_season'=>'required|numeric',
                'Judul'=>'required',
                'poster_path'=>'required',
                'backdroph_path'=>'required',
                'vote_average'=>'required',
                'resolution'=>'required',
            ]);
    
            $serial_tv = new Serial_TV;
            $serial_tv->id_serial = $request->id_serial;
            $serial_tv->judul = $request->Judul;
            $serial_tv->id_season = $request->id_season;
    
            $input_newupload = new new_upload;
            $input_newupload->id_newupload = $request->id_serial;
            $input_newupload->status = $request->status;
            $input_newupload->backdroph = $request->backdroph_path;
            $input_newupload->poster_path = $request->poster_path;
            $input_newupload->vote_average = $request->vote_average;
            $input_newupload->Judul = $request->Judul;
            $input_newupload->resolution = $request->resolution;
    
            if ($serial_tv->save()&&$input_newupload->save()) {
                return redirect()->back()->with('sucsess', 'Data Berhasil Disimpan');
            }else{
                return redirect()->back()->with('fail', 'Data gagal Ditambahkan');
            }
        } else {
            $request->validate([
                'serial_id'=>'required|numeric',
                'season_number'=>'required|numeric',
                'slug'=>'required',
                'season'=>'required',
                'episode'=>'required',
                'link'=>'required',
            ]);

            $seasons = new Seasons;
            $seasons->serial_id = $request->serial_id;
            $seasons->slug = $request->slug;
            $seasons->season_number = $request->season_number;
            $seasons->season = $request->season;
            $seasons->episode = $request->episode;
            $seasons->link = $request->link;
            if ($seasons->save()) {
                return redirect()->back()->with('sucsess1', 'Data Berhasil Disimpan');
            }else{
                return redirect()->back()->with('fail1', 'Data gagal Ditambahkan');
            }
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
