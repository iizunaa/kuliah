@extends('layouts.main')
@section('konten')
{{-- .main --}}
<!-- Tampilkan daftar semua film -->

<div class="title-card ">
  <h3>Rekomendasi</h3>
  <div class="border-bottom"></div>
    <div class="newCustomPostAll" data-total="6" data-version="2">
    <div class="customPost series">
@if (isset($recommendedFilms) && $recommendedFilms->isNotEmpty())

    <!-- Tampilkan daftar film rekomendasi -->
    @foreach ($recommendedFilms as $film)
    <article class="bs seventh">
    <div class="bsx">
            <!-- Tampilkan detail film -->
            <a href="/home/{{ $film->id }}">
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
              <!-- ... -->
              
              @endforeach
              @endif
    </div>
    </div>
  </div>
<!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            <div class="title-card ">
                  <h3>Baru Rilis</h3>
                  <div class="border-bottom"></div>
                    <div class="newCustomPostAll" data-total="6" data-version="2">
                    <div class="customPost series">

                      {{-- card --}}

                      @foreach ($films as $film)
                      <article class="bs seventh">
                        <div class="bsx">
                          <a href="/home/{{ $film->id }}">
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
                        @if ($loop->iteration == 9) @break @endif
                      </article>
                     
                      @endforeach
                      {{-- end card --}}

                    </div>
                  </div>
            </div>
        <!-- /#page-content-wrapper -->    
    </div>

    
    <!-- /#wrapper -->        
    @endsection