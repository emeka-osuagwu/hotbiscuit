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
          </div>
      </div>
    </div>
    <div class="categories-navigation">
      <h2>Play With</h2>
      <div class="category-holder">
        <div class="male-category-navigation category"><a class="btn button button-males  active" href="male-users-page.html">Guys</a></div>
          <p>Or</p>
        <div class="females-category-navigation category"><a class="btn button button-females" href="female-users-page.html">Girls</a></div>  
      </div>
      </div>
    <div class="card users-players-card col-lg-4">
      <div class="user-profile-holder center">
          <div class="user-profile-img male-user-profile"><img src="images/girl picture.png"></div>
          <div class="user-profile-info">
            <div class="username-holder"><h3>Vikkiebelle</h3></div>
            <div class="description-holder"><strong>I Like Humans!</strong></div>
            <div class="age-holder">25 Years Old</div>
            <div class="location-holder">Surulere</div>
          </div>
      </div>
      <button class="play-button play-button-males">PLAY</button>
    </div>

    <div class="card users-players-card col-lg-4">
      <div class="user-profile-holder center">
          <div class="user-profile-img male-user-profile"><img src="images/girl-2-pictures.png"></div>
          <div class="user-profile-info">
            <div class="username-holder"><h3>Cynthia</h3></div>
            <div class="description-holder"><strong>Beta Ibo chic</strong></div>
            <div class="age-holder">22 Years Old</div>
            <div class="location-holder">Ijora</div>
          </div>
      </div>
      <button class="play-button play-button-males">PLAY</button>
    </div>

    <div class="card users-players-card col-lg-4 last">
      <div class="user-profile-holder center">
          <div class="user-profile-img male-user-profile"><img src="images/girl-3-picture.png"></div>
          <div class="user-profile-info">
            <div class="username-holder"><h3>Tolani</h3></div>
            <div class="description-holder"><strong>Good Girl</strong></div>
            <div class="age-holder">22 Years Old</div>
            <div class="location-holder">Lagos Island</div>
          </div>
      </div>
      <button class="play-button play-button-males">PLAY</button>
    </div>
  </section>

@endsection