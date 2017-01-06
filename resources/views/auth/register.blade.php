@extends('auth.layouts.auth')

@section('title')
  Register
@endsection

@section('form')
  @include('auth.partials.register-form')
@endsection

@section('links')
  <a href="{{ url('/login') }}">Login</a>
@endsection
