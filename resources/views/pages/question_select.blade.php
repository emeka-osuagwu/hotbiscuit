@extends('master')

@section('content')

  @include('pages.sections.header')
  
  <section class="col-lg-12 test-section-1 section-1 container" id="home-container">
      <div class="section-1__content__card center card test-card">
       <div class="test-card-section-1__content__card__image-holder">
         <div class="test-card-section-1__content__card__question-count question-count">Question 1</div>
       </div>
        <div class="test-card-section-1__content__card__question-holder question-holder">
          <div class="option">
            <h3>A: Chocolate Bread</h3>
          </div>
          <span>OR</span>
          <div class="option">
            <h3>B: Chocolate Cake</h3>
          </div>
        </div>
        <div class="button-select">
          <button class="btn option-a">A</button>
          <button class="btn option-b">B</button>
        </div>
      </div>
  </section>

@endsection