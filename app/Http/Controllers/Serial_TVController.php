<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Models\Seasons;
use App\Models\Serial_TV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Serial_TVController extends Controller
{
    public function show(Seasons $slug)
    {
        $api_key = "5bfab28bfcd4ef02d39eec1dfbd6a264";
        $page = 1;
        $DetailTV = Http::get("https://api.themoviedb.org/3/tv/$slug->serial_id?api_key=$api_key&page=$page")
        ->json();

        $season = Serial_TV::join('seasons', 'serial_tv.id_season', '=', 'seasons.season_number')
                    ->where('seasons.season_number', $slug->season_number)
                    ->get(['seasons.season_number','seasons.slug', 'seasons.episode']);

        $title = "Nonton Film ".$DetailTV['name']." - Sub Indo - Gabutin";
        $image = "https://image.tmdb.org/t/p/w300/".$DetailTV['poster_path'];
        $deskripsi = $title." Streaming dan Download Film Terupdate Berkualitas HD Gratis! Semua ada Lengkap Hanya di Gabutin";
        $keywords = "Nonton ".$DetailTV['name'].","."Nonton ".$DetailTV['name']." sub indo";

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($deskripsi);
        SEOMeta::setKeywords($keywords);

        OpenGraph::setDescription($deskripsi);
        OpenGraph::setTitle($title);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::setSiteName('Gabutin');
        OpenGraph::addImage($image);
        

        return view('serial_view', [
            'loadepisode' => $slug,
            'seasons' => $season,
            'TV' => $DetailTV,
        ]);
    }
}
