@extends('master')

@section('content')

  @include('pages.sections.header')
    <section class="col-lg-12 users-section-1 section-1 container" id="home-container">
        <div class="card center col-lg-12" id="score-card">
          <div class="score-holder">
            <h3>GREAT!</h3>
            <p>You Scored</p>
            <h2>{{ $score }} / 15</h2>
            <div class="images-holder">
              <div class="images-holder-div images-holder-left col-xs-6"><img src="{{ asset('asset/images/profile-image.png') }}"></div>
              <div class="images-holder-div images-holder-right col-xs-6"><img src="{{ asset('asset/images/girl-2-pictures.png') }}"></div>
            </div>
            <div>
              <p>You both have a thing or two in common! Would you like to meet?</p>
              <div id="meet-button-holder">
                <!-- <button class="button meet-button">Meet</button> -->
                <a href="{{ Url('/') }}" class="button back-button">Go Back</a>
              </div>
            </div>
          </div>
        </div>
    </section>

   @endsection