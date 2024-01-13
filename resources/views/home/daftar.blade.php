@extends('layouts.main')
@section('konten')
{{-- <div class="cari-isi">
  <form action="/daftar">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="cari berdasarkan judul" name="search">
      <button class="btn btn-outline-secondary" type="submit" >search</button>
    </div>
</form>
</div> --}}
<div class="title-card ">
    <h3>Semua Film</h3>
    <div class="border-bottom"></div>
      <div class="newCustomPostAll" data-version="2">
      <div class="customPost series">

        {{-- card --}}

        @foreach ($films as $film)
        <article class="bs seventh">
          <div class="bsx">
            <a href="/daftar/{{ $film->id }}">
              <div class="limit">
                <div class="bt">
                </div>
                <img class="lazy film" src="{{ asset('storage/'. $film->thumbnail) }}" width="250" height="141">
              </div>
            </a>
                <div class="sosev">
                  <h2> {{ $film->title}} </h2>
                  <span>
                    <i>{{ $film->category->name }}</i>
                    <i >|</i>
                    <i>{{ $film->tahun_terbit }}</i>
                  </span>
                </div>
          </div>
        </article>
        @endforeach
        {{-- end card --}}

      </div>
    </div>
</div>
@endsection