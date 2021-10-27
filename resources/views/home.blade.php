@extends('layout.main')
@section('content')
<div class="container-fluid">
    <div id="carouselExampleDark" class="carousel carousel-light slide my-3" data-bs-ride="carousel" >
        @php $i =1; @endphp
        <div class="carousel-inner">
          @foreach ($backdroph as $itembackdroph)
          <div class="carousel-item {{ $i == '1' ? 'active' : '' }}" data-bs-interval="5000">
            @php $i++ @endphp
            <img src="https://image.tmdb.org/t/p/w1280{{ $itembackdroph->backdroph_serial == 'null' ? '' : $itembackdroph->backdroph}}" class="d-block w-100" alt="..."> 
            <div class="carousel-caption">
                <h5 class="badge bg-warning text-dark">New Upload</h5> <br/>
                <p class="badge bg-warning text-dark">{{ $itembackdroph->Judul }}</p>
            </div>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

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
<script type='text/javascript' src='//coveredbetting.com/f3/22/18/f322181be8e0092e78af8874fb5fcb55.js'></script>

<div class="container-fluid">
 @if (!empty($search_mov) || !empty($search_tv))
    {{-- search mov --}}
    <div class="card">
      <div class="card-header bg-dark text-light">
        <h1>Movies</h1>
      </div>   
      <div class="card-body">
          <div class="card  my-3 border-0">
              <div class="row mb-3">
                @foreach ($search_mov as $sm)
                @foreach ($slugsearch as $slugssearchlink)
                @if ($sm['id'] == $slugssearchlink->id_movies)
                    
                <div class="col-sm-2 col-6 text-center">
                  <div class="card border-0">
                    <div class="img-overflay"> 
                    <a href="{{ route('film.show', $slugssearchlink->slug) }}">
                    <img src="https://image.tmdb.org/t/p/w500/{{ $sm['poster_path'] }}" class="card-img-top" alt="...">
                  </a>
                    <span class="btn btn-warning label-image-top">Rate:{{ $sm['vote_average'] }}</span>
                </div>
                <h2 class="fs-5">{{ $sm['title'] }}</h2><hr>
                <p>{{ Str::substr($sm['overview'], 0, 60)."..." }}</p>
                <a href="{{ route('film.show', $slugssearchlink->slug) }}">
                <button class="btn btn-dark">Nonton</button>
                </a>
                  </div>
              </div>
                @endif
                    
                @endforeach
                @endforeach
                
              </div>
        </div>
      
      </div>
    </div>  
    {{-- end search mov --}}

        {{-- search tv --}}
        <div class="card">
          <div class="card-header bg-dark text-light">
            <h1>Serial TV</h1>
          </div>   
          <div class="card-body">
              <div class="card  my-3 border-0">
                  <div class="row mb-3">
                    @foreach ($search_tv as $st)
                    <div class="col-sm-2 col-6 text-center">
                      <div class="card border-0">
                        <div class="img-overflay"> 
                        <a href="{{ route('tv.show', $st['id']) }}">
                        <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $st['poster_path'] }}" class="card-img-top" alt="...">
                      </a>
                        <span class="btn btn-warning label-image-top">Rate:{{ $st['vote_average'] }}</span>
                    </div>
                    <h2 class="fs-5">{{ $st['name'] }}</h2>
                    <hr>
                    <p>{{ Str::substr($st['overview'], 0, 60)."..." }}</p>
                    <a href="{{ route('tv.show', $st['id']) }}">
                    <button class="btn btn-dark">Nonton</button>
                    </a>
                      </div>
                  </div>
                        
                    @endforeach
                    
                  </div>
            </div>
          
          </div>
        </div>  
        {{-- end search tv --}}
 @else
 {{-- new uploads --}}
  <div class="card my-3">
    <div class="card-header bg-dark text-light">
      <h1>New Uploads</h1>
    </div>   
    <div class="card-body">
        <div class="card  my-3 border-0">
            <div class="row mb-3">
              @foreach ($backdroph as $new_upload)
              <div class="col-sm-2 col-6 text-center">
                <div class="card border-0">
                  <div class="img-overflay mb-2"> 
                    <a href="{{ $new_upload->status == '0' ? route('film.show', $new_upload->id_newupload) : route('tv.show', $new_upload->id_newupload) }}">   
                  <img src="https://image.tmdb.org/t/p/w500/{{ $new_upload->poster_path }}" class="card-img-top" alt="...">
                </a>
                  <span class="btn btn-warning label-image-top">Rate:{{ $new_upload->vote_average }}</span>
                  <span class="btn btn-danger label-image-bottom">{{ $new_upload->resolution }}</span>
              </div>
              <h5>{{ $new_upload->Judul }}</h5>
              <a href="{{ $new_upload->status == '0' ? route('film.show', $new_upload->id_newupload) : route('tv.show', $new_upload->id_newupload) }}">
                <button class="btn btn-dark">Nonton</button>
              </a>
                </div>
            </div>
                  
              @endforeach
              
            </div>
      </div>
    
    </div>
  </div>
 {{-- end new uploads --}}
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
    {{-- Popular Movies --}}
    <div class="card">
      <div class="card-header bg-dark text-light">
        <h1>Popular Movies</h1>
      </div>   
      <div class="card-body">
          <div class="card  my-3 border-0">
              <div class="row mb-3">
                @foreach ($popularMovies as $PM)
                @foreach ($slug as $sluglink)
                @if ($PM['id'] == $sluglink->id_movies)                    
                <div class="col-sm-2 col-6">
                  <div class="card border-0 text-center">
                    <div class="img-overflay my-2"> 
                    <a href="{{ route('film.show', $sluglink->slug) }}">
                    <img src="https://image.tmdb.org/t/p/w500/{{ $PM['poster_path'] }}" class="card-img-top" alt="...">
                    </a>
                    <span class="btn btn-warning label-image-top">Rate:{{ $PM['vote_average'] }}</span>
                    </div>
                    <h5>{{ $PM['title'] }}</h5>
                    <p>{{ Str::substr($PM['overview'], 0, 60)."..." }}</p>
                <a href="{{ route('film.show', $sluglink->slug) }}">
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
    {{-- End Popular Movies --}}
  {{-- ads --}}

  <div class="mobileShow justify-content-center">
    <script type="text/javascript">
      atOptions = {
        'key' : '3b7f21fe0b2e7437a9eb373cfaef18cf',
        'format' : 'iframe',
        'height' : 60,
        'width' : 468,
        'params' : {}
      };
      document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.effectivedisplayformat.com/3b7f21fe0b2e7437a9eb373cfaef18cf/invoke.js"></scr' + 'ipt>');
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
   {{-- Popular Serial Tv --}}
   <div class="card my-3">
    <div class="card-header bg-dark text-light">
      <h1>Popular Serial Tv</h1>
    </div>   
    <div class="card-body">
        <div class="card  my-3 border-0">
            <div class="row mb-3">
              @foreach ($popularTV as $TV)
              <div class="col-sm-2 col-6">
                <div class="card border-0 text-center">
                  <div class="img-overflay my-2"> 
                  <a href="{{ route('tv.show', $TV['id']) }}">
                  <img src="https://image.tmdb.org/t/p/w500/{{ $TV['poster_path'] }}" class="card-img-top" alt="...">
                </a>
                  <span class="btn btn-warning label-image-top">Rate:{{ $TV['vote_average'] }}</span>
              </div>
              <h5>{{ $TV['name'] }}</h5>
              <p>{{ Str::substr($TV['overview'], 0, 60)."..." }}</p>
              <a href="{{ route('tv.show', $TV['id']) }}">
              <button class="btn btn-dark">Nonton Film</button>
              </a>
                </div>
            </div>
                  
              @endforeach
              
            </div>
      </div>
    
    </div>
  </div>
  {{-- End Popular Serial Tv --}}
</div>
 @endif
</div>

@endsection