@extends('dashboard.layouts.main')

@section('konten')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Upload New Film</h1>
  </div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/films" enctype="multipart/form-data">
        @csrf

      <div class="mb-3 ">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
        name="title" autofocus value="{{ old('title')}}">
        @error("title")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3 ">
        <label for="tahun_terbit" class="form-label">Tahun</label>
        <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" 
        name="tahun_terbit" autofocus value="{{ old('tahun_terbit')}}">
        @error("tahun_terbit")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3 ">
        <label for="category" class="form-label">Genre</label>
        <select class="form-select" name="category_id">
          @foreach ($categories as $category)
          @if(old('category_id')== $category->id)
          <option value="{{ $category->id }}" selected>{{ $category->name}}</option> 
          @else   
          <option value="{{ $category->id }}">{{ $category->name}}</option>
         @endif
          @endforeach
        </select>
      </div>

      <div class="mb-3 ">
        <label for="link" class="form-label">link</label>
        <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" 
        name="link" autofocus value="{{ old('link')}}">
        @error("link")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="thumbnail" class="form-label">Poster Film</label>
        <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="thumbnail">
        @error("thumbnail")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="sinopsis" class="form-label @error('sinopsis') is-invalid @enderror">Sinopsis</label>
        <input id="sinopsis" value="{{ old('sinopsis') }}" type="hidden" name="sinopsis">
        @error("sinopsis")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <trix-editor input="sinopsis"></trix-editor>
      </div>

      <button type="submit" class="btn btn-primary">UPLOAD</button>
    </form>
</div>

<script>
   document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection