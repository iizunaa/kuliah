@extends('layouts.main')
@section('konten')

<div class="p-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="formContainer">
              <h2 class="p-2 text-center mb-4 h4" id="formHeading">Registration</h2>
            <form action="/register" method="POST">
                @csrf
              <div class="form-group mt-3 ">
                <label class="mb-2" for="name" >Your Name</label>
                <input class="form-control @error('name')
                 is-invalid @enderror" id="name" name="name" type="text" placeholder="Name" required value="{{ old('name') }}"/>
                 @error('name')
                 <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                 @enderror
                </div>
              <div class="form-group mt-3">
                <label class="mb-2" for="username">Your Username</label>
                <input class="form-control @error('username')
                is-invalid @enderror" id="username" name="username" type="text" placeholder="Username" required value="{{ old('username') }}"/>
                @error('username')
                 <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                 @enderror
              </div>
              <div class="form-group mt-3">
                <label class="mb-2" for="email">Your Email</label>
                <input class="form-control @error('email')
                is-invalid @enderror" id="email" name="email" type="email" placeholder="name@example.com" required value="{{ old('email') }}"/>
                @error('email')
                 <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                 @enderror
              </div>
              <div class="form-group mt-3">
                <label class="mb-2" for="password">Password</label>
                <input class="form-control @error('password')
                is-invalid @enderror" id="password" name="password" type="password" placeholder="Password" required />
                @error('password')
                 <div class="invalid-feedback">
                   {{ $message }}
                  </div>
                 @enderror
              </div>
              <button class="btn btn-success btn-lg w-100 mt-4">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already register? <a href="/login">login</a></small>
          </div>
        </div>
      </div>
    </div>
    </div>

    @endsection