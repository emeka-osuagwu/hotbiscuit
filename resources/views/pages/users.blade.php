@extends('master')

@section('content')

  @include('pages.sections.header')
  
  <section class="col-lg-12 users-section-1 section-1 container" id="home-container">
    
    <div class="card users-profile-card center">
      <div class="user-profile-holder center">
          <div class="user-profile-img"><img src="{{ asset('asset/images/profile-image.png') }}"></div>
          <div class="user-profile-info">
            <div class="username-holder"><h3>{{ Auth::user()->username }}</h3></div>
            <div class="description-holder"><strong>{{ Auth::user()->about }}</strong></div>
            <div class="age-holder">{{ Auth::user()->age }} Years Old</div>
            <div class="location-holder">{{ Auth::user()->location }}</div>
            <div class="description-holder"><strong>you are {{ Auth::user()->personality_level }}% fun to be with</strong></div>
         </div>
      </div>
    </div>

    <!-- <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=this is the tweet you will be sending the use profile to twwitter" data-size="large">Tweet</a> -->

    <div class="categories-navigation">
      <h2>Play With</h2>
      </div>
      
      @foreach($users->except(Auth::user()->id) as $user)
        <div class="card users-players-card col-lg-4">
          <div class="user-profile-holder center">
              <div class="user-profile-img male-user-profile"><img src="{{ $user->image }}"></div>
              <div class="user-profile-info">
                <div class="username-holder"><h3>{{ $user->username }}</h3></div>
                <div class="description-holder"><strong>{{ $user->about }}</strong></div>
                <div class="age-holder">{{ $user->age }} Years Old</div>
                <div class="location-holder">{{ $user->location }}</div>
              </div>
          </div>
          <a href="{{ Url('play/' . $user->id ) }}" class="play-button play-button-males">PLAY</a>
        </div>
      @endforeach
  
  </section>

@endsection