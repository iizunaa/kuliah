@extends('layouts.main')
@section('konten')
<div class="title-card">
<div class="dagruel-sinopsis">
    <div class="left">
        <bingkai id="feetImage">
            <div class="waluhImage">
                <img src="{{ asset('storage/'. $film->thumbnail) }}" alt="">
            </div>
        </bingkai>
    </div>
    <div class="right">
        <div class="sinojudul">
            <div class="judul">
                <h1>{{ $film->title }}</h1>
            </div>
            <div class="alternaiv">
                <span class="aniSeason">
                    {{ $film->tahun_terbit }} | {{ $film->category->name }} | 
                    <a href="/like/{{$film->id}}" class="text-danger"><i class="bi bi-heart"></i> {{ $like }} Like </a>
                </span>
            </div>
        </div>
        <div class="desc">
            {!! $film->sinopsis !!}
        </div>
    </div>
</div>
</div>
<div class="ratio ratio-16x9 ">
<iframe src="{{ $film->link }}" width="640" height="480" allowfullscreen></iframe>
</div>
@endsection