@extends('layouts.app')
@section('title',$r->title)
@section('content')
<h1>{{ $r->title }}</h1>
<p class="text-muted">Status: {{ ucfirst($r->status) }}</p>
<div>{!! nl2br(e($r->content)) !!}</div>
<a href="{{ route("community.index") }}" class="btn btn-secondary">Back</a>
@endsection
