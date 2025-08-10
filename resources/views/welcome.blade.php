@extends('layouts.app')

@section('title', 'User Auth')
@section('content')
  <div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="mb-5">Welcome to User Auth</h1>
      @if(!Auth::check())
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Get Started</a>
      @endif
    </div>
  </div>
@endsection