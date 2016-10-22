@extends('master')

@section('content')

  @include('pages.sections.header')
  

  @if ($can_play == false)
    <script>
      swal({
        title: "Opp sorry you can only have 15 questions",
        type: "success",
        confirmButtonColor: "#298829",
        confirmButtonText: "OK",

        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm)
      {
        if (isConfirm) {
            window.location="/";
          }
      });
    </script>
  @endif  


  <section class="col-lg-12 test-section-1 section-1 container" id="home-container">
      <div class="section-1__content__card center card test-card">
       <div class="test-card-section-1__content__card__image-holder">
         <div class="test-card-section-1__content__card__question-count question-count">Question {{ $number_of_played_questions + 1 }} </div>
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
          <form action="{{ Url('play') }}" method="post">
            <input type="text" hidden="true" name="question_id"  value="{{ $question->id }}">
            <input type="text" hidden="true" name="answer"  value="{{ $question->option_1 }}">
            <input type="text" hidden="true" name="player_id"  value="{{ $player_id }}">
            <button type="submit" class="btn option-a">A</button>
          </form>          

          <form action="{{ Url('question/answer') }}" method="post">
            <input type="text" hidden="true" name="question_id"  value="{{ $question->id }}">
            <input type="text" hidden="true" name="answer"  value="{{ $question->option_2 }}">
            <button type="submit" class="btn option-b">B</button>
          </form>
        </div>
      </div>
  </section>

@endsection