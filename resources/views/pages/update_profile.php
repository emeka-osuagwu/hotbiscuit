@extends('master')

@section('content')

	@include('pages.sections.header')
    
    <section class="col-lg-12 section-1 container registration-section-1" id="home-container">
      <div class="registration-section-1__content col-lg-12">
        <div class="center logo-holder"><img src="{{ asset('asset/images/hot-biscuit-logo.png') }}"></div>
        <div class="registration-section-1__content__card center card welcome-card">
          <div class="registration-section-1__content__card__image-holder"></div>
          <div class="registration-section-1__content__card__main-copy">
            <h2>Create your profile before you proceed</h2>
          </div>
          <div class="registration-section-1__content__card__form-holder">
            <div class="col-lg-12 ">
              <input placeholder="Input Your Username" />
            </div>
            <div class="col-lg-12">
              <input type="Password" placeholder="Your Password" />
            </div>
            <div class="col-lg-12">
              <input type="password" placeholder="Confirm Password" />
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection