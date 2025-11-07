@extends('layouts.app')
@section('title','Community Cookbook')
@section('content')
<h1>Community Cookbook</h1>
@auth <a class="btn btn-success mb-3" href="{{ route('community.create') }}">Submit a recipe</a> @else <p>Please login to submit.</p> @endauth

@if($recipes->count())
  <table class="table">
    <thead><tr><th>Title</th><th>Author</th><th>Status</th><th>Action</th></tr></thead>
    <tbody>
      @foreach($recipes as $r)
        <tr>
          <td>{{ $r->title }}</td>
          <td>{{ $r->user->name ?? 'Member' }}</td>
          <td>{{ ucfirst($r->status) }}</td>
          <td>
            <a href="{{ route('community.show',$r->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
            @auth
              @if($r->status=='pending')
                <form action="{{ route('community.approve',$r->id) }}" method="POST" class="d-inline">@csrf<button class="btn btn-sm btn-outline-success">Approve</button></form>
                <form action="{{ route('community.reject',$r->id) }}" method="POST" class="d-inline">@csrf<button class="btn btn-sm btn-outline-danger">Reject</button></form>
              @endif
            @endauth
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <p class="text-muted">No community submissions yet.</p>
@endif
@endsection
