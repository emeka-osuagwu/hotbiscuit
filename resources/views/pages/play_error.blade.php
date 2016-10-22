@extends('master')

@section('content')

  @include('pages.sections.header')
  
  <section class="col-lg-12 test-section-1 section-1 container" id="home-container">
        Sorry you can nolonger play any question with this user

        <br>

        go back to users page <a href="{{ url('/') }}">Click</a>
  </section>

@endsection