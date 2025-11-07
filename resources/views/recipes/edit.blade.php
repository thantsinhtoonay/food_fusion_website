@extends('layouts.app')
@section('title','Edit Recipe')
@section('content')
<h1>Edit: {{ $r->title }}</h1>
<form method="POST" action="{{ route('recipes.update',$r->id) }}">
  @csrf @method('PUT')
  <div class="mb-3"><input name="title" value="{{ $r->title }}" class="form-control" required></div>
  <div class="mb-3"><input name="cuisine" value="{{ $r->cuisine }}" class="form-control"></div>
  <div class="mb-3"><input name="dietary" value="{{ $r->dietary }}" class="form-control"></div>
  <div class="mb-3">
    <select name="difficulty" class="form-select" required>
      <option value="easy" @if($r->difficulty=='easy') selected @endif>Easy</option>
      <option value="medium" @if($r->difficulty=='medium') selected @endif>Medium</option>
      <option value="hard" @if($r->difficulty=='hard') selected @endif>Hard</option>
    </select>
  </div>
  <div class="mb-3"><textarea name="ingredients" class="form-control" rows="4">{{ $r->ingredients }}</textarea></div>
  <div class="mb-3"><textarea name="instructions" class="form-control" rows="6">{{ $r->instructions }}</textarea></div>
  <div class="text-end"><button class="btn btn-success">Update</button></div>
</form>
@endsection
