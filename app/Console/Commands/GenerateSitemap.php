<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\new_upload;
use App\Models\Serial_TV;
use Illuminate\Support\Facades\Http;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // modify this to your own needs
        $sitemap = Sitemap::create()
        ->add(Url::create('/'))
        ->add(Url::create('/home'))
        ->add(Url::create('/all-serial'))
        ->add(Url::create('/all-movies'));
        
        //Home Sitemap
        $api_key = "5bfab28bfcd4ef02d39eec1dfbd6a264";
        $page = 1;
        $popularMovies = Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$api_key&page=$page")
        ->json()['results'];
        $popularTV = Http::get("https://api.themoviedb.org/3/tv/popular?api_key=$api_key&page=$page")
        ->json()['results'];
    
        foreach ($popularMovies as $pm) {
            $sitemap->add(Url::create("/film"."/".$pm['id']));
        }
    
        foreach ($popularTV as $TV) {
            $sitemap->add(Url::create("/TV"."/".$TV['id']));
        }
    
        $new_upload = new_upload::latest()->get()->take(12);
    
        foreach ($new_upload as $np) {
            if ($np->status == '0') {
                $sitemap->add(Url::create("/film"."/".$np->id_newupload));
            }elseif ($np->status == '1') {
                $sitemap->add(Url::create("/TV"."/".$np->id_newupload));
                $episode = Serial_TV::join('seasons', 'serial_tv.id_season', '=', 'seasons.season_number')
                        ->where('serial_tv.id_serial', $np->id_newupload)
                        ->get(['serial_tv.id_serial','slug','judul','id_season', 'season_number','seasons.season','seasons.episode', 'seasons.link']);
    
                foreach ($episode as $episode) {
                    $sitemap->add(Url::create("/TV"."/".$episode->slug));
                }
            }
        }
        //Movies Page Sitemap
        $MoviesPage = collect([]);
        for ($i=1; $i <= 500 ; $i++) { 
            $MoviesPage->push(Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$api_key&page=$i")
            ->json()['results']);
        }
        
        foreach ($MoviesPage as $key) {
           foreach ($key as $value) {
            $sitemap->add(Url::create("/film"."/".$value['id']));
           }
        }
        //TV Page Sitemap
        $TVPage = collect([]);
        for ($i=1; $i <= 500 ; $i++) { 
            $TVPage->push(Http::get("https://api.themoviedb.org/3/tv/popular?api_key=$api_key&page=$i")
            ->json()['results']);
        }
    
        foreach ($TVPage as $key) {
           foreach ($key as $value) {
            $sitemap->add(Url::create("/TV"."/".$value['id']));
           }
        }
    
    
        $sitemap->writeToFile(public_path('sitemap.xml'));
    
    }
}