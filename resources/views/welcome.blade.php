@extends('layouts.app')
@section('title')
    Welcome
@endsection
@section('content')
  <!--<div class="carousel carousel-slider" data-indicators="true">
    <div class="carousel-fixed-item">
      <a class="btn waves-effect white grey-text darken-text-2">button</a>
    </div>
    <div class="carousel-item red white-text" href="#one!">
      <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!">
      <h2>Second Panel</h2>
      <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!">
      <h2>Third Panel</h2>
      <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!">
      <h2>Fourth Panel</h2>
      <p class="white-text">This is your fourth panel</p>
    </div>
  </div>-->

<div class="carousel carousel-slider" data-indicators="true">
    <a class="carousel-item" href="#one!"><img src="http://leica-geosystems.com/-/media/images/leicageosystems/key%20visuals%202360x714%20and%202480x750/leica_compliance_general-conditions_pic_1640x725.ashx?h=725&la=en&w=1640&hash=45528433D361DDB4B48001173FE31FC08DBD0254"></a>
    <a class="carousel-item" href="#two!"><img src="http://leica-geosystems.com/-/media/images/leicageosystems/key%20visuals%202360x714%20and%202480x750/leica_compliance_general-conditions_pic_1640x725.ashx?h=725&la=en&w=1640&hash=45528433D361DDB4B48001173FE31FC08DBD0254"></a>
    <a class="carousel-item" href="#three!"><img src="http://leica-geosystems.com/-/media/images/leicageosystems/key%20visuals%202360x714%20and%202480x750/leica_compliance_general-conditions_pic_1640x725.ashx?h=725&la=en&w=1640&hash=45528433D361DDB4B48001173FE31FC08DBD0254"></a>
    <a class="carousel-item" href="#four!"><img src="http://leica-geosystems.com/-/media/images/leicageosystems/key%20visuals%202360x714%20and%202480x750/leica_compliance_general-conditions_pic_1640x725.ashx?h=725&la=en&w=1640&hash=45528433D361DDB4B48001173FE31FC08DBD0254"></a>
</div>

<div class="container">
    <div class="row">
        <div class="col s12 m4 l4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4 l4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4 l4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                autoPlay: true
            });
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
    </style>
@endsection