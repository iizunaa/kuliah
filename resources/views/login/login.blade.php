@extends('layouts.main')
@section('konten')
{{-- secion --}}
<div class="p-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          {{-- alert pesan Type here--}}
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('loginerror'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginerror') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

            <div class="formContainer">
              <h2 class="p-2 text-center mb-4 h4" id="formHeading">Welcome Back</h2>
            <form action="/login" method="POST">
              @csrf
              <div class="form-group mt-3 ">
                <label class="mb-2" for="email">Your Email</label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Your Email" autofocus required value="{{ old('email') }}"/>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>  
              @enderror
              </div>
              <div class="form-group mt-3">
                <label class="mb-2" for="password">Your Password</label>
                <input class="form-control" id="password" type="password" name="password" placeholder="Password"/>
              </div>
              <button class="btn btn-success btn-lg w-100 mt-4">Login</button>
            </form>
            <small class="d-block text-center mt-3">you haven't registered? <a href="/register">register now!</a></small>
          </div>
        </div>
      </div>
    </div>
    </div>

    @endsection