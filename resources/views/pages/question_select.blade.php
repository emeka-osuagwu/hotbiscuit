@extends('master')

@section('content')

  @include('pages.sections.header')
  
  <section class="col-lg-12 test-section-1 section-1 container" id="home-container">
      <div class="section-1__content__card center card test-card">
       <div class="test-card-section-1__content__card__image-holder">
         <div class="test-card-section-1__content__card__question-count question-count">Question {{ $question_number }}</div>
       </div>
        <div class="test-card-section-1__content__card__question-holder question-holder">
          <div class="option">
            <h3>A: {{ $question->question_1 }}</h3>
          </div>
          <span>OR</span>
          <div class="option">
            <h3>B: {{ $question->question_2 }}</h3>
          </div>
        </div>
        <div class="button-select">
          <form action="{{ Url('question/answer') }}" method="post">
            <input type="text" hidden="true" name="question_id"  value="{{ $question->id }}">
            <input type="text" hidden="true" name="answer"  value="{{ $question->option_1 }}">
            <button type="submit" class="btn option-a">A</button>
          </form>

          <button class="btn option-b">B</button>
        </div>
      </div>
  </section>

@endsection