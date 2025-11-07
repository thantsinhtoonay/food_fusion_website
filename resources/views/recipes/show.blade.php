@extends('layouts.app')
@section('title',$r->title)
@section('content')
<h1>{{ $r->title }}</h1>
<p class="text-muted">{{ $r->cuisine }} • {{ ucfirst($r->difficulty) }}</p>
<div class="row">
  <div class="col-md-8">
    <h4>Ingredients</h4>
    <div>{!! nl2br(e($r->ingredients)) !!}</div>
    <h4 class="mt-3">Instructions</h4>
    <div>{!! nl2br(e($r->instructions)) !!}</div>
  </div>
  <div class="col-md-4">
    @if($r->image_path)<img src="{{ asset($r->image_path) }}" class="img-fluid rounded">@endif
  </div>
</div>
@endsection
