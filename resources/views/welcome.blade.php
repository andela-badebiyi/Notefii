@extends('layouts.app')
@section('title')
    Welcome
@endsection

@section('content')
  <div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="{{ asset('images/slider1.jpg') }}"> <!-- random image -->
        <div class="caption left-align">
          <h3>Save</h3>
          <h5 class="light grey-text text-lighten-3">Store Notes safely and securely on the clouds</h5>
        </div>
      </li>
      <li>
        <img src="{{ asset('images/slider2.jpg') }}"> <!-- random image -->
        <div class="caption right-align">
          <h3>Share</h3>
          <h5 class="light grey-text text-lighten-3">Easily Share notes with friends.</h5>
        </div>
      </li>
    </ul>
  </div>

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.slider').slider();
        });
    </script>
@endsection

@section('css')
    <style>
        .carousel {
            /*height: 100% !important;*/
        }

        img {
            height: 100%;
        }

        .slides li div {
            position: absolute;
            top: 0 !important;
            left: 0 !important;
            width: 300px !important;
            height: auto !important;
            margin: 20% 2rem !important;
            padding: 1rem !important;
            display: none;
            color: #FFF;
            display: block;
            background: rgba(0, 0, 0, .4);
        }
    </style>
@endsection