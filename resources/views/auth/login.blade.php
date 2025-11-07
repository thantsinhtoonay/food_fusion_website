@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3>Login</h3>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-2"><input name="email" class="form-control" type="email" placeholder="Email" required></div>
          <div class="mb-2"><input name="password" class="form-control" type="password" placeholder="Password" required></div>
          <div class="text-end"><button class="btn btn-success">Login</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
