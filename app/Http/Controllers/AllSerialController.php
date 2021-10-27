<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class AllSerialController extends Controller
{
    public function index(Request $request)
    {
        $api_key = "5bfab28bfcd4ef02d39eec1dfbd6a264";
        $items = Http::get("https://api.themoviedb.org/3/tv/popular?api_key=$api_key&page=$request->page")
        ->json();

        $paginator = $this->getPaginator($request, $items['results']);

        SEOMeta::setTitle('Gabutin | Nonton Streaming Drama Serial Netflix Bioskop Sub Indo');
        SEOMeta::setDescription('Nonton Drama Serial Sub Indo Terbaik. Streaming dan Download Drama Serial Terupdate Berkualitas HD Gratis! Semua ada Lengkap Hanya di Gabutin');
        SEOMeta::setKeywords("nonton film,nonton,nonton Drama Serial,LK21,IndoXXI".",".$items['results'][0]['name'].",".$items['results'][1]['name'].",".$items['results'][2]['name'].",".$items['results'][3]['name'].",".$items['results'][4]['name'].",".$items['results'][5]['name'].",".$items['results'][6]['name'].",".$items['results'][7]['name'].",".$items['results'][8]['name'].",".$items['results'][9]['name'].",".$items['results'][10]['name'].",".$items['results'][11]['name'].",".$items['results'][12]['name'].",".$items['results'][13]['name'].",".$items['results'][14]['name'].",".$items['results'][15]['name'].",".$items['results'][16]['name'].",".$items['results'][17]['name'].",".$items['results'][18]['name']);

        OpenGraph::setDescription('Nonton Drama Serial Sub Indo Terbaik. Streaming dan Download Drama Serial Terupdate Berkualitas HD Gratis! Semua ada Lengkap Hanya di Gabutin');
        OpenGraph::setTitle('Gabutin | Nonton Streaming Drama Serial Netflix Bioskop Sub Indo');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setSiteName('Gabutin'); //define site_name
        return view('serial_page', [
            'serial' => $paginator,
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
