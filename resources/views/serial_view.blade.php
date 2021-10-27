@extends('layout.main')
@section('content')

<div class="container">
  <div class="card mb-3 my-3">
    <div class="row">
      <div class="col-12 col-sm-6" style="width: 300px">
        <img src="http://image.tmdb.org/t/p/w300/{{ $TV['poster_path'] }}" class="img-fluid rounded-start" alt="...">
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
        <span class="btn btn-outline-primary btn-sm mb-3">Total Season : {{$TV['number_of_seasons']}}</span>
        <span class="btn btn-outline-primary btn-sm mb-3">Total Episode : {{$TV['number_of_episodes'] }}</span>
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
<script type='text/javascript' src='//coveredbetting.com/f3/22/18/f322181be8e0092e78af8874fb5fcb55.js'></script>
<div class="ratio ratio-16x9">
  <iframe src="{{ $loadepisode->link }}" frameborder="0" scrolling="0" allowfullscreen></iframe>
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
<div class="accordion my-3" id="accordionExample">
 <div class="accordion-item">
   <h2 class="accordion-header" id="headingOne">
     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
     Season : {{ $loadepisode->season }}
     </button>
   </h2>
   <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
     <div class="accordion-body" style="width:100%; height:220px; overflow:auto;">
       <table class="table"> 
         <tbody>
           @foreach ($seasons as $item)
           <tr>
             <td><a href="{{ route('serial.show', $item->slug) }}">episode {{ $item->episode }}</a></td>
           </tr>
           @endforeach
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
</div>
@endsection