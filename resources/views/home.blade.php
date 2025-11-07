@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="hero p-5 text-center rounded-3 mb-4">
  <h1 class="display-5">Cook. Create. Connect.</h1>
  <p class="lead">Discover recipes, share your creations, and join the FoodFusion community.</p>
  <p class="mt-3">
    <a class="btn btn-success btn-lg me-2" href="{{ route('recipes.index') }}">Explore Recipes</a>
    <a class="btn btn-outline-success btn-lg" href="{{ route('community.index') }}">Community Cookbook</a>
  </p>
</div>

<h3>Featured Recipes & Culinary Trends</h3>
<div class="row g-3 mb-4">
  @forelse($featured as $f)
    <div class="col-md-4">
      <div class="card h-100">
        @if($f->image_path)<img src="{{ asset($f->image_path) }}" class="card-img-top">@endif
        <div class="card-body">
          <h5 class="card-title">{{ $f->title }}</h5>
          <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($f->description,120) }}</p>
          <a href="{{ route('recipes.show',$f->id) }}" class="btn btn-outline-success btn-sm">View Recipe</a>
        </div>
      </div>
    </div>
  @empty
    <div class="col-12 text-muted">No featured recipes yet.</div>
  @endforelse
</div>

<h3>Upcoming Cooking Events</h3>
<div class="row g-3">
  @foreach($events as $e)
    <div class="col-md-6">
      <div class="card p-3">
        <h5>{{ $e['title'] }}</h5>
        <p class="small text-muted">{{ $e['date'] }}</p>
      </div>
    </div>
  @endforeach
</div>
@endsection
