@extends('layouts.main')
@section('konten')
<div class="title-card ">
    <h3>History</h3>
    <div class="border-bottom"></div>
      <div class="newCustomPostAll mt-3" data-total="6" data-version="2">

        <div class="table-responsive col-md">
        {{-- card --}}
        <table class="table table-striped table-light ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Genre</th>
              <th scope="col">Tahun</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($likes as $like)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $like->film->title }}</td>
              <td>{{$like->film->category->name}}</td>
              <td>{{$like->film->tahun_terbit}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{-- end card --}}
        </div>
      </div>
    </div>
</div>

@endsection