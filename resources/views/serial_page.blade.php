@extends('layout.main')
@section('content')
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

{{-- ads --}}
<script type='text/javascript' src='//coveredbetting.com/f3/22/18/f322181be8e0092e78af8874fb5fcb55.js'></script>

<div class="container-fluid my-3">
    <div class="card">
      <div class="card-header bg-dark text-light">
        <h2>All Serial</h2>
      </div>   
      <div class="card-body">
          <div class="card  my-3 border-0">
              <div class="row mb-3">
                @foreach ($serial as $serials)
                <div class="col-sm-2 col-6">
                  <div class="card border-0 text-center">
                    <div class="img-overflay mb-3"> 
                      <a href="{{ route('tv.show', $serials['id']) }}">   
                    <img src="https://image.tmdb.org/t/p/w500/{{ $serials['poster_path']}}" class="card-img-top" alt="...">
                  </a>
                    <span class="btn btn-warning label-image-top">Rate:{{ $serials['vote_average'] }}</span>
                </div>
                <h5 class="card-title">{{ $serials['name'] }}</h5>
                <p>{{ Str::substr($serials['overview'], 0, 60)."..." }}</p>
                <a href="{{ route('tv.show', $serials['id']) }}">
                <button class="btn btn-dark mb-3">Nonton Serial</button>
                </a>
                  </div>
              </div>
                    
                @endforeach
                
              </div>
        </div>
      
      </div>
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
  <div class="d-flex justify-content-center">
    {{ $serial->onEachSide(1)->links('pagination::bootstrap-4') }} 
  </div>
@endsection