@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3>Create account</h3>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="row g-2 mb-2">
            <div class="col"><input name="first_name" class="form-control" placeholder="First name"></div>
            <div class="col"><input name="last_name" class="form-control" placeholder="Last name"></div>
          </div>
          <div class="mb-2"><input name="email" class="form-control" type="email" placeholder="Email" required></div>
          <div class="mb-2"><input name="password" class="form-control" type="password" placeholder="Password" required></div>
          <div class="mb-2"><input name="password_confirmation" class="form-control" type="password" placeholder="Confirm password" required></div>
          <div class="text-end"><button class="btn btn-success">Register</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
