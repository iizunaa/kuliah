@extends('dashboard.layouts.main')

@section('konten')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Your Films</h1>
  </div>
  
  @if(session()->has('success'))
  <div class="alert alert-primary" role="alert">
    {{ session('success')}}
  </div>
  @endif
  <div class="table-responsive col-lg-8">
    <a href="/dashboard/films/create" class="btn btn-primary mb-3">
      <span data-feather="upload"></span>
      Upload film
    </a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Genre</th>
          <th scope="col">Tahun</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($films as $film)
            
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $film->title }}</td>
          <td>{{ $film->category->name }}</td>
          <td>{{ $film->tahun_terbit }}</td>
          <td>
            <a href="/dashboard/films/{{ $film->id }}/edit" class="badge bg-info"><span data-feather="edit"></span></a>

            <form class="d-inline" action="/dashboard/films/{{ $film->id }}" method="post">
              @method('delete')
              @csrf
              <button class="badge bg-info border-0" onclick="return confirm('Yakin nih?')"><span data-feather="trash"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection