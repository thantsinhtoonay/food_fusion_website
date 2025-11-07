@extends('layouts.app')
@section('title','Submit Community Recipe')
@section('content')
<h1>Submit Your Recipe</h1>
<form method="POST" action="{{ route('community.store') }}">
  @csrf
  <div class="mb-3"><input name="title" class="form-control" placeholder="Title" required></div>
  <div class="mb-3"><textarea name="content" class="form-control" rows="6" placeholder="Describe your recipe and tips" required></textarea></div>
  <div class="text-end"><button class="btn btn-success">Submit for review</button></div>
</form>
@endsection
