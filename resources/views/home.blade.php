@extends('layouts.app')

@section('content')
  <app-navbar></app-navbar>
  <div class="section">
    <div class="container">
      <h1 class="title">Notificaciones Push</h1>
      <h2 class="subtitle">Escriba un mensaje para ser enviado</h2>
      <app-notification-form></app-notification-form>
    </div>
  </div>
@endsection
