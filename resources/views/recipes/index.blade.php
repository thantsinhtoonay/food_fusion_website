@extends('layouts.app')
@section('title','Recipes')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Recipes</h1>
  @auth <a href="{{ route('recipes.create') }}" class="btn btn-success">Add Recipe</a> @endauth
</div>

@if($recipes->count())
  <div class="row g-3">
    @foreach($recipes as $r)
      <div class="col-md-4">
        <div class="card h-100">
          @if($r->image_path)<img src="{{ asset($r->image_path) }}" class="card-img-top">@endif
          <div class="card-body">
            <h5>{{ $r->title }}</h5>
            <p class="small text-muted">{{ $r->cuisine }} • {{ ucfirst($r->difficulty) }}</p>
            <p>{{ \Illuminate\Support\Str::limit($r->description,120) }}</p>
            <a href="{{ route('recipes.show',$r->id) }}" class="btn btn-outline-success btn-sm">View</a>
            @auth
              <a href="{{ route('recipes.edit',$r->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
              <form action="{{ route('recipes.destroy',$r->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button class="btn btn-outline-danger btn-sm">Delete</button></form>
            @endauth
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-3">{{ $recipes->links() }}</div>
@else
  <p class="text-muted">No recipes yet.</p>
@endif
@endsection
