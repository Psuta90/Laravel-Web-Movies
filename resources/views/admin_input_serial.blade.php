@extends('admin.main')
@section('content-admin')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Search Serial</h6>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin_inputserial.index') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search Serial" name="search">
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
                <th scope="col">id_serial</th>
                <th scope="col">Judul</th>
                <th scope="col">Gambar</th>
                <th scope="col">poster path</th>
                <th scope="col">backdrop path</th>
                <th scope="col">vote average</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($serial as $itemserial)
                  
              <tr>
                <td>{{ $itemserial['id'] }}</td>
                <td>{{ $itemserial['name'] }}</td>
                <td><img src="https://image.tmdb.org/t/p/w92{{ $itemserial['poster_path'] }}" alt="gambar"></td>
                <td>{{ $itemserial['poster_path'] }}</td>
                <td>{{ $itemserial['backdrop_path'] }}</td>
                <td>{{ $itemserial['vote_average'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-6 col-sm-6 col-md-6 col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Serial</h6>
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
          <form method="POST" action="{{ route('admin_inputserial.store') }}">
              @csrf
              <div class="form-group">
                  <label for="id_serial">Masukan ID_Serial</label>
                  <input type="text" name="id_serial" class="form-control" id="id_serial" placeholder="Masukan ID Movies Dari Table Di atas">
                </div>
                @error('id_serial')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                  <label for="id_season">Masukan ID_Season</label>
                  <input type="text" name="id_season" class="form-control" id="id_season" placeholder="Masukan ID Season harus unique">
                </div>
                @error('id_season')
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
                  <label for="resolution">Masukan Resolution</label>
                  <input type="text" name="resolution" class="form-control" id="resolution" placeholder="Masukan resolusi nya">
                </div>
                @error('resolution')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                  <input type="hidden" value="1" name="status">
                  <input type="hidden" value="from1" name="form">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-6 col-md-6 col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Season Dan Episode</h6>
      </div>
      <div class="card-body">
          @if (session('sucsess1'))
              <div class="alert alert-success" role="alert">
                  {{ session('sucsess1') }}
              </div>
          @elseif (session('fail'))
          <div class="alert alert-danger" role="alert">
              {{ session('fail1') }}
          </div>
          @endif
          <form method="POST" action="{{ route('admin_inputserial.store') }}">
              @csrf
              <div class="form-group">
                  <label for="serial_id">Masukan ID_Serial</label>
                  <input type="text" name="serial_id" class="form-control" id="serial_id" placeholder="Masukan ID Movies Sebelumnya">
                </div>
                @error('serial_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
              <div class="form-group">
                  <label for="season_number">Masukan ID_Season</label>
                  <input type="text" name="season_number" class="form-control" id="season_number" placeholder="Masukan ID Season Harus Sama Sesuai id_season yang sebelumnya di masukin">
                </div>
                @error('season_number')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                  <label for="slug">Masukan Slug</label>
                  <input type="text" name="slug" class="form-control" id="slug" placeholder="Example : judul-S1-episode1">
                </div>
                @error('slug')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                  <label for="season">Masukan Season</label>
                  <input type="text" name="season" class="form-control" id="season" placeholder="Masukan Season hanya angka kalo gapaham tanya orangnya yg buat">
                </div>
                @error('season')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                  <label for="episode">Masukan Episode</label>
                  <input type="text" name="episode" class="form-control" id="episode" placeholder="Masukan episode hanya angka kalo gapaham tanya orangnya yg buat">
                </div>
                @error('episode')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                  <label for="link">Masukan link</label>
                  <input type="text" name="link" class="form-control" id="link" placeholder="Masukan link Video Serialnya">
                </div>
                @error('link')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>  
@endsection