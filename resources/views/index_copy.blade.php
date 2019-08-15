@extends('layouts.master')

@section('content')
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/extjs/6.0.0/ext-all-debug.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/extjs/6.0.0/classic/theme-crisp/theme-crisp-debug.js"></script>
 {!! Html::script('js/app.js') !!}

 <div class="text-center">
  <h1>Laravel ToDo App with ExtJs frontend</h1>
  <hr/>



  @include('partials.flash_notification')

 </div>

@endsection