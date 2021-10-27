<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class Movies_PageController extends Controller
{
    public function index(Request $request)
    {
        $api_key = "5bfab28bfcd4ef02d39eec1dfbd6a264";
        $items = Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$api_key&page=$request->page")
        ->json()['results'];

        foreach ($items as $key ) {
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

        $slug = $input_movies->whereIn('id_movies',[$items[0]['id'],$items[1]['id'],$items[2]['id'],$items[3]['id'],$items[4]['id'],$items[5]['id'],$items[6]['id'],$items[7]['id'],$items[8]['id'],$items[9]['id'],$items[10]['id'],$items[11]['id'],$items[12]['id'],$items[13]['id'],$items[14]['id'],$items[15]['id'],$items[16]['id'],$items[17]['id'],$items[18]['id'],$items[19]['id'],])->get();

        $paginator = $this->getPaginator($request, $items);

        SEOMeta::setTitle('Gabutin | Nonton Streaming Film Netflix Bioskop Sub Indo');
        SEOMeta::setDescription('Nonton Film Sub Indo Terbaik. Streaming dan Download Film Terupdate Berkualitas HD Gratis! Semua ada Lengkap Hanya di Gabutin');

        OpenGraph::setDescription('Nonton Film Sub Indo Terbaik. Streaming dan Download Film Terupdate Berkualitas HD Gratis! Semua ada Lengkap Hanya di Gabutin');
        OpenGraph::setTitle('Gabutin | Nonton Streaming Film Netflix Bioskop Sub Indo');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setSiteName('Gabutin'); //define site_name


        return view('movies_page', [
            'movies' => $paginator,
            'slug'   => $slug,
        ]);
    }

    private function getPaginator(Request $request, $items)
    {
    $total = 1000; // total count of the set, this is necessary so the paginator will know the total pages to display
    $page = $request->page ?? 1; // get current page from the request, first page is null
    $perPage = 2; // how many items you want to display per page? // the array that we actually pass to the paginator is sliced
    $items = array_slice($items, $perPage); // the array that we actually pass to the paginator is sliced

    return new LengthAwarePaginator($items, $total, $perPage, $page, [
        'path' => $request->url(),
        'query' => $request->query()
    ]);
    }
}
