@extends('layouts.master')

@section('content')

 <div class="text-center">
  <h1>Laravel ToDo App with ExtJs frontend</h1>
  <hr/>

  <a href="/todo">Todo</a>

  @include('partials.flash_notification')

 </div>

@endsection
