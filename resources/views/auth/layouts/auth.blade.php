@extends('layouts.app')

@section('content')
  <section class="hero is-fullheight is-dark is-bold">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
          <div class="column is-4 is-offset-4">
            <h1 class="title">
              @yield('title')
            </h1>
            <div class="box">
              @yield('form')
            </div>
            <p class="has-text-centered">
              @yield('links')
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
