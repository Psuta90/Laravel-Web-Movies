@extends('admin.main')
@section('content-admin')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Search Movies</h6>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin_inputmovies.index') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search Movies" name="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
        <table class="table my-3">
            <thead>
              <tr>
                <th scope="col">id_movies</th>
                <th scope="col">Judul</th>
                <th scope="col">Gambar</th>
                <th scope="col">poster path</th>
                <th scope="col">backdrop path</th>
                <th scope="col">vote average</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movies as $mv)
              <tr>
                <td>{{ $mv['id'] }}</td>
                <td>{{ $mv['original_title'] }}</td>
                <td><img src="https://image.tmdb.org/t/p/w92{{ $mv['poster_path'] }}" alt="gambar"></td>
                <td>{{ $mv['poster_path'] }}</td>
                <td>{{ $mv['backdrop_path'] }}</td>
                <td>{{ $mv['vote_average'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Movies</h6>
    </div>
    <div class="card-body">
        @if (session('sucsess'))
            <div class="alert alert-success" role="alert">
                {{ session('sucsess') }}
            </div>
        @elseif (session('fail'))
        <div class="alert alert-danger" role="alert">
            {{ session('fail') }}
        </div>
        @endif
        <form method="POST" action="{{ route('admin_inputmovies.store') }}">
            @csrf
            <div class="form-group">
                <label for="id_movies">Masukan ID_Movies</label>
                <input type="text" name="id_movies" class="form-control" id="id_movies" placeholder="Masukan ID Movies Dari Table Di atas">
              </div>
              @error('id_movies')
              <div class="alert alert-danger" role="alert">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group">
                <label for="Judul">Masukan Judul</label>
                <input type="text" name="Judul" class="form-control" id="Judul" placeholder="Masukan Judul Film Dari Table Di atas">
              </div>
              @error('Judul')
              <div class="alert alert-danger" role="alert">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group">
                <label for="poster_path">Masukan poster_path</label>
                <input type="text" name="poster_path" class="form-control" id="poster_path" placeholder="Masukan poster_path Film Dari Table Di atas">
              </div>
              @error('poster_path')
              <div class="alert alert-danger" role="alert">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group">
                <label for="backdroph_path">Masukan backdroph_path</label>
                <input type="text" name="backdroph_path" class="form-control" id="backdroph_path" placeholder="Masukan backdroph_path Film Dari Table Di atas">
              </div>
              @error('backdroph_path')
              <div class="alert alert-danger" role="alert">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group">
                <label for="vote_average">Masukan vote_average</label>
                <input type="text" name="vote_average" class="form-control" id="vote_average" placeholder="Masukan vote_average Film Dari Table Di atas">
              </div>
              @error('vote_average')
              <div class="alert alert-danger" role="alert">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group">
                <label for="link">Masukan link video embed</label>
                <input type="text" name="link_video" class="form-control" id="link" placeholder="Masukan link Film">
              </div>
              @error('link_video')
              <div class="alert alert-danger" role="alert">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group">
                <label for="resolution">Masukan Resolusinya</label>
                <input type="text" name="resolution" class="form-control" id="resolution" placeholder="Masukan link Film">
              </div>
              @error('resolution')
              <div class="alert alert-danger" role="alert">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group">
                <input type="hidden" value="0" name="status">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection