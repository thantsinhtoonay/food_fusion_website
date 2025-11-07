@extends('layouts.app')
@section('title','Contact')
@section('content')
<h1>Contact Us</h1>
<form method="POST" action="{{ route('contact.send') }}">
  @csrf
  <div class="mb-3"><input name="name" class="form-control" placeholder="Your name" required></div>
  <div class="mb-3"><input name="email" type="email" class="form-control" placeholder="Email" required></div>
  <div class="mb-3"><input name="subject" class="form-control" placeholder="Subject"></div>
  <div class="mb-3"><textarea name="message" class="form-control" rows="5" placeholder="Message" required></textarea></div>
  <div class="text-end"><button class="btn btn-success">Send</button></div>
</form>
@endsection
