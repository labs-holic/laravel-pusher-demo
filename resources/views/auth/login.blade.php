@extends('auth.layouts.auth')

@section('title')
  Login
@endsection

@section('form')
  @include('auth.partials.login-form')
@endsection

@section('links')
  <a href="{{ url('/register') }}">Register an Account</a>
  |
  <a href="{{ url('/password/reset') }}">Forgot password</a>
@endsection
