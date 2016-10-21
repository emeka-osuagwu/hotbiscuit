@extends('master')

@section('content')

	@include('pages.sections.header')
    
    <script>
      swal("Good job!", "You clicked the button!", "success")
    </script>
    <section class="col-lg-12 section-1 container" id="home-container">
      <div class="section-1__content col-lg-12">
        <div class="center logo-holder"><img src="{{ asset('asset/images/hot-biscuit-logo.png') }}"></div>
        <div class="section-1__content__card center card welcome-card">
          <div class="section-1__content__card__image-holder"></div>
          <div class="section-1__content__card__main-copy">
            <h2>Could this be sweet love?<br> 
            Let’s find out!</h2>
          </div>
          <div class="section-1__content__card__signin-buttons">
            <div class="section-1__content__card__signin-buttons--facebook-button signin-button center">
              <a href="{{ Url('auth/facebook') }}"><img src="{{ asset('asset/images/facebook-signin.jpg') }}"></a>
            </div>

            <span>OR</span>
            
            <div class="section-1__content__card__signin-buttons--twitter-button signin-button center">
              <a href="{{ Url('auth/twitter') }}"><img src="{{ asset('asset/images/twitter-signin.jpg') }}"></a>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection