@extends('layouts.app')
@section('title','Add Recipe')
@section('content')
<h1>Add Recipe</h1>
<form method="POST" action="{{ route('recipes.store') }}">
  @csrf
  <div class="mb-3"><input name="title" class="form-control" placeholder="Title" required></div>
  <div class="mb-3"><input name="cuisine" class="form-control" placeholder="Cuisine (e.g. Italian)"></div>
  <div class="mb-3"><input name="dietary" class="form-control" placeholder="Dietary (e.g. Vegan)"></div>
  <div class="mb-3">
    <select name="difficulty" class="form-select" required>
      <option value="easy">Easy</option><option value="medium" selected>Medium</option><option value="hard">Hard</option>
    </select>
  </div>
  <div class="mb-3"><textarea name="ingredients" class="form-control" placeholder="Ingredients" rows="4"></textarea></div>
  <div class="mb-3"><textarea name="instructions" class="form-control" placeholder="Instructions" rows="6"></textarea></div>
  <div class="text-end"><button class="btn btn-success">Save</button></div>
</form>
@endsection
