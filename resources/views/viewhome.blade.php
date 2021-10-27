@extends('layout.main')
@section('content')

<div class="container">
@if (Route::currentRouteName() == 'film.show')
<div class="card mb-3 my-3">
  <div class="row">
    <div class="col-12 col-sm-6 desc_view">
      <img src="https://image.tmdb.org/t/p/w300/{{ $details['poster_path'] }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-12 col-sm-6">
      <div class="card-body">
          <h1 class="card-title">{{ $details['title'] }}</h1>
        <p class="card-text">{{ $details['overview'] }}</p>

      <span class="btn btn-outline-danger btn-sm mb-3">Genre : 
        @foreach ($details['genres'] as $genre)
            {{ $genre['name'] }}@if (!$loop->last), @endif
        @endforeach
      </span><br>
          <span class="btn btn-outline-danger btn-sm mb-3">{{ !empty($movie_source->link_video) || !isset($dbgdrive['status'])? 'Movie Tersedia' : 'Movie Belom Di Upload' }}</span>
                    {{-- ads --}}

                    <div class="mobileShow justify-content-center">
                      <script type="text/javascript">
                        atOptions = {
                          'key' : '33457484ee30067ffbfc4b2f4c288826',
                          'format' : 'iframe',
                          'height' : 50,
                          'width' : 320,
                          'params' : {}
                        };
                        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.effectivedisplayformat.com/33457484ee30067ffbfc4b2f4c288826/invoke.js"></scr' + 'ipt>');
                      </script>
                     </div>
                    <div class="mobileHide justify-content-center">
                      <script type="text/javascript">
                        atOptions = {
                          'key' : '81d673180911200511857b1fef7f0473',
                          'format' : 'iframe',
                          'height' : 90,
                          'width' : 728,
                          'params' : {}
                        };
                        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.effectivedisplayformat.com/81d673180911200511857b1fef7f0473/invoke.js"></scr' + 'ipt>');
                      </script>
                    </div>
                  
                   {{-- ads --}}
      </div>
    </div>
  </div>
</div>

@if (!empty($movie_source->link_video))
<div class="ratio ratio-16x9">
  <iframe src="{{$movie_source->link_video}}" frameborder="0" scrolling="0" allowfullscreen height="400"></iframe>
</div>
@elseif(!isset($dbgdrive['status']))
<div class="ratio ratio-16x9">
  <iframe src="https://databasegdriveplayer.co/player.php?imdb={{$details['imdb_id']}}" frameborder="0" scrolling="0" allowfullscreen height="400"></iframe>
</div>
@endif
{{-- ads --}}
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col">
      <script async="async" data-cfasync="false" src="//pl16496532.highperformancecpm.com/12ac36e0d32a68e5bdf456d1409b66aa/invoke.js"></script>
      <div id="container-12ac36e0d32a68e5bdf456d1409b66aa"></div>
    </div>
  </div>
</div>
{{-- ads --}}

<div class="card">
  <div class="card-header bg-dark text-light">
    <h2>Simmilar Movies</h2>
  </div>   
  <div class="card-body">
    <div class="card  my-3 border-0">
        <div class="row mb-3">
          @foreach ($similliar as $sm_movies)
          @foreach ($slug as $slugslink)
              @if ($sm_movies['id'] == $slugslink->id_movies)
              <div class="col-sm-2 col-6">
                <div class="card border-0 text-center">
                  <div class="img-overflay my-2"> 
                  <a href="{{ route('film.show', $slugslink->slug) }}">
                  <img src="https://image.tmdb.org/t/p/w500/{{ $sm_movies['poster_path'] }}" class="card-img-top" alt="...">
                </a>
                  <span class="btn btn-warning label-image-top">Rate:{{ $sm_movies['vote_average'] }}</span>
                
    
              </div>
              <h5>{{ $sm_movies['title'] }}</h5>
              <p>{{ Str::substr($sm_movies['overview'], 0, 60)."..." }}</p>
              <a href="{{ route('film.show', $slugslink->slug) }}">
              <button class="btn btn-dark">Nonton Film</button>
              </a>
                </div>
            </div>
              @else    
              @endif
          @endforeach
          @endforeach
          
        </div>
  </div>

</div>
</div>  

</div>

@elseif (Route::currentRouteName() == 'tv.show')
<div class="card mb-3 my-3">
    <div class="row">
      <div class="col-12 col-sm-6" style="width: 300px">
        <img src="https://image.tmdb.org/t/p/w300/{{ $TV['poster_path'] }}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-12 col-sm-6 ">
        <div class="card-body">
            <h1 class="card-title">{{ $TV['name'] }}</h1>
          <p class="card-text">{{ $TV['overview'] }}</p>
    
        <span class="btn btn-outline-primary btn-sm mb-3">Genre : 
          @foreach ($TV['genres'] as $genre)
              {{ $genre['name'] }}@if (!$loop->last), @endif
          @endforeach
        </span>
        <span class="btn btn-outline-primary btn-sm mb-3">Season : {{$TV['number_of_seasons']}}</span>
        <span class="btn btn-outline-primary btn-sm mb-3">Total Episode : {{ $TV['number_of_episodes'] }}</span>
        <span class="btn btn-outline-danger btn-sm mb-3">Status Movie : {{ $seasons->firstWhere('id_serial', '=', $TV['id']) ? 'Movie Tersedia' : 'Movie Belom Di Upload'}}</span>
        </div>
      </div>
    </div>
</div>
@foreach ($seasons as $ss)
<div class="accordion my-3" id="accordionExample">
 <div class="accordion-item">
   <h2 class="accordion-header" id="headingOne">
     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
     {{ $ss->judul }}
     </button>
   </h2>
   <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
     <div class="accordion-body" style="width:100%; height:220px; overflow:auto;">
       <table class="table"> 
         <tbody>
           @foreach ($episode as $es)
           @if ($es->season_number == $ss->id_season)
           <tr>
             <td><a href="{{ route('serial.show', $es->slug) }}">episode{{ $es->episode }}</a></td>
           </tr>
           @endif  
           @endforeach
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
@endforeach
@endif
</div>
@endsection