@extends('layouts.app')
@section('title','Culinary Resources')
@section('content')
<h1>Culinary Resources</h1>
<ul class="list-group">
  @foreach($resources as $res)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>{{ $res->title }}</strong><br><small class="text-muted">{{ $res->description }}</small>
      </div>
      @if($res->file_path)
        <a class="btn btn-sm btn-outline-success" href="{{ asset($res->file_path) }}" download>Download</a>
      @endif
    </li>
  @endforeach
</ul>
<div class="mt-3">{{ $resources->links() }}</div>
@endsection
