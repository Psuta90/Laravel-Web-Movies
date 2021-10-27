<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Models\Movie;
use App\Models\new_upload;
use App\Models\Serial_TV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Concat;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        SEOMeta::setTitle('Gabutin | Nonton Streaming Film Netflix Bioskop Online LK21 IndoXXI');
        SEOMeta::setDescription('Gabutin Adalah Situs Nonton Film Netflix Dan Bioskop Streaming Online Gratis Subtitle Indonesia Terlengkap dan Terbaru. Nonton Streaming Tanpa Buffer di Gabutin');

        OpenGraph::setDescription('Gabutin Adalah Situs Nonton Film Netflix Dan Bioskop Streaming Online Gratis Subtitle Indonesia Terlengkap dan Terbaru. Nonton Streaming Tanpa Buffer di Gabutin');
        OpenGraph::setTitle('Gabutin | Nonton Streaming Film Netflix Bioskop Online LK21 IndoXXI');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setSiteName('Gabutin'); //define site_name

        $api_key = "5bfab28bfcd4ef02d39eec1dfbd6a264";
        $page = 1;
        $query = request('cari');
        $search_mov=[];
        $search_tv=[];
        $popularMovies = Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$api_key&page=$page")
        ->json()['results'];
        $popularTV = Http::get("https://api.themoviedb.org/3/tv/popular?api_key=$api_key&page=$page")
        ->json()['results'];

        $new_upload = new_upload::latest()->get()->take(12);

        foreach ($popularMovies as $key) {
            $input_movies = new Movie;
            $validatedData = Validator::make($key, [
                'original_title' => 'unique:movies,slug',
                'id' => 'unique:movies,id_movies',
            ]);

            if ($validatedData->fails()){}
            else{
                $input_movies->slug = str_replace(str_split('\\/:*?"<>| '),"-",$key['title']) ;
                $input_movies->id_movies = $key['id'];
                $input_movies->save();
            }
        }

        $slug = $input_movies->whereIn('id_movies',[$popularMovies[0]['id'],$popularMovies[1]['id'],$popularMovies[2]['id'],$popularMovies[3]['id'],$popularMovies[4]['id'],$popularMovies[5]['id'],$popularMovies[6]['id'],$popularMovies[7]['id'],$popularMovies[8]['id'],$popularMovies[9]['id'],$popularMovies[10]['id'],$popularMovies[11]['id'],$popularMovies[12]['id'],$popularMovies[13]['id'],$popularMovies[14]['id'],$popularMovies[15]['id'],$popularMovies[16]['id'],$popularMovies[17]['id'],$popularMovies[18]['id'],$popularMovies[19]['id'],])->get();

        if (!empty($query)) {
            $search_mov = Http::get("https://api.themoviedb.org/3/search/movie?api_key=$api_key&query=$query")
            ->json()['results'];
        
            // Belom Kelar ini
            foreach ($search_mov as $key) {
            $input_movies = new Movie;
            $validatedData = Validator::make($key, [
                'original_title' => 'unique:movies,slug',
                'id' => 'unique:movies,id_movies',
            ]);

            if ($validatedData->fails()){}
            else{
                $input_movies->slug = str_replace(str_split('\\/:*?"<>| '),"-",$key['title']) ;
                $input_movies->id_movies = $key['id'];
                $input_movies->save();
            }
            }
            $data_slugsearch = [];
            for ($i=0; $i < count($search_mov) ; $i++) { 
            $data_slugsearch[] = $search_mov[$i]['id'];
            }
            $slug_search = $input_movies->whereIn('id_movies', $data_slugsearch)->get();

            $search_tv = Http::get("https://api.themoviedb.org/3/search/tv?api_key=$api_key&query=$query")
            ->json()['results'];

            return view('home',[
            'search_mov'    => $search_mov,
            'search_tv'     => $search_tv,
            'backdroph'     => $new_upload,
            'slugsearch'    => $slug_search,]);
        }

        return view('home', [
            'popularMovies' => collect($popularMovies)->take(12),
            'popularTV'     => collect($popularTV)->take(12),
            'backdroph'     => $new_upload,
            'slug'          => $slug,
        ]);

    }

    public function show($id)
    {
        $dbslug = Movie::where('slug', $id)->get();
        foreach ($dbslug as $key) {
            $id = $key->id_movies;
        }
        $api_key = "5bfab28bfcd4ef02d39eec1dfbd6a264";
        $page = 1;
        $DetailMovies = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=$api_key&page=$page")
        ->json();
        $DetailTV = Http::get("https://api.themoviedb.org/3/tv/$id?api_key=$api_key&page=$page")
        ->json();
        $SimilliarMovies = [];
        $getmoviedb = [];
        if (Route::currentRouteName() == 'film.show') {
            $SimilliarMovies = Http::get("https://api.themoviedb.org/3/movie/$id/similar?api_key=$api_key&page=$page")
            ->json()['results'];
            foreach ($SimilliarMovies as $key) {
                $input_movies = new Movie;
                $validatedData = Validator::make($key, [
                'original_title' => 'unique:movies,slug',
                'id' => 'unique:movies,id_movies',
            ]);

            if ($validatedData->fails()){}
            else{
                $input_movies->slug = str_replace(str_split('\\/:*?"<>| '),"-",$key['title']) ;
                $input_movies->id_movies = $key['id'];
                $input_movies->save();
            }
            }
            $slug = $input_movies->whereIn('id_movies',[$SimilliarMovies[0]['id'],$SimilliarMovies[1]['id'],$SimilliarMovies[2]['id'],$SimilliarMovies[3]['id'],$SimilliarMovies[4]['id'],$SimilliarMovies[5]['id'],$SimilliarMovies[6]['id'],$SimilliarMovies[7]['id'],$SimilliarMovies[8]['id'],$SimilliarMovies[9]['id'],$SimilliarMovies[10]['id'],$SimilliarMovies[11]['id'],$SimilliarMovies[12]['id'],$SimilliarMovies[13]['id'],$SimilliarMovies[14]['id'],$SimilliarMovies[15]['id'],$SimilliarMovies[16]['id'],$SimilliarMovies[17]['id'],$SimilliarMovies[18]['id'],$SimilliarMovies[19]['id'],])->get();
            $getmoviedb = Http::get("https://api.gdriveplayer.us/v1/imdb/".$DetailMovies['imdb_id'])
            ->json();

            return view('viewhome', [
            'similliar' => collect($SimilliarMovies)->take(12),
            'slug' => $slug,
            'details' => $DetailMovies,]);
        }

        $movies = Movie::where('id_movies', $id)->first();
        
        $episode = Serial_TV::join('seasons', 'serial_tv.id_season', '=', 'seasons.season_number')
                    ->where('serial_tv.id_serial', $id)
                    ->get(['serial_tv.id_serial','slug','judul','id_season', 'season_number','seasons.season','seasons.episode', 'seasons.link']);

        $season = Serial_TV::where('id_serial', $id)->get();

        if (empty($DetailTV['number_of_seasons'])) {
            $title = "Nonton ".$DetailMovies['title']." ".date("(Y)")." - Sub Indo - Gabutin";
            $image = "https://image.tmdb.org/t/p/w300/".$DetailMovies['poster_path'];
            $deskripsi = "Nonton ".$DetailMovies['title']." ".date("(Y)").",".$DetailMovies['overview'];
            $keywords = "Nonton ".$DetailMovies['title'].","."Nonton ".$DetailMovies['title']." sub indo";
        } else {
            $title = "Nonton ".$DetailTV['name']." ".date("(Y)")." - Sub Indo - Gabutin";
            $image = "https://image.tmdb.org/t/p/w300/".$DetailTV['poster_path'];
            $deskripsi ="Nonton ".$DetailTV['name']." ".date("(Y)").",".$DetailTV['overview'];
            $keywords = "Nonton ".$DetailTV['name'].","."Nonton ".$DetailTV['name']." sub indo";
        }
        
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($deskripsi);
        SEOMeta::setKeywords($keywords);

        OpenGraph::setDescription($deskripsi);
        OpenGraph::setTitle($title);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::setSiteName('Gabutin'); //define site_name
        OpenGraph::addImage($image);

        return view('viewhome', [
            'TV' => $DetailTV,
            'seasons' => $season,
            'episode' => $episode,
            'movie_source' => $movies,
            'dbgdrive' => $getmoviedb,
        ]);
    }

}
