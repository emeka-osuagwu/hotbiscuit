@extends('master')

@section('content')

  @include('pages.sections.header')
  

  @if (Session::has('profile-updated'))
    <script>
      swal({
        title: "Profile Updated :)",
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

    <section class="col-lg-12 section-1 container registration-section-1" id="home-container">
      <div class="registration-section-1__content col-lg-12">
        <div class="center logo-holder"><img src="{{ asset('asset/images/hot-biscuit-logo.png') }}"></div>
        <div class="registration-section-1__content__card center card welcome-card">
          <div class="registration-section-1__content__card__image-holder"></div>
          <div class="registration-section-1__content__card__main-copy">
            <h2>Create your profile before you proceed</h2>
          </div>

          <form action="{{ Url('profile/update') }}" method="post">
            <div class="registration-section-1__content__card__form-holder">
              <div class="col-lg-12 ">
                <input placeholder="Your Email" name="email"  value="{{ Auth::user()->email }}" />
              </div>

              <div class="col-lg-12">
                <input type="text" name="username" value="{{ Auth::user()->username }}" placeholder="Enter Your Desired Username" />
              </div>

              <div class="col-lg-12">
                <span class="select-title">Select a Profile Picture</span>
                <input class="select-file" type="file" name="file"  placeholder="Image" />
              </div>

              <div class="col-lg-12">

                <input type="number" name="age" value="{{ Auth::user()->age }}" placeholder="Enter your Age" />
              </div>
              <div class="col-lg-6">
                <span class="select-title">Select Your Sex</span>
                <select class="select-box" name="sex" required="true">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>  
              </div>
              <div class="col-lg-6">
                <span class="select-title">Select Your Location</span>
                <select class="select-box" name="location" required="true">
                  <option value="lagos">lagos</option>
                  <option value="Uyo">Uyo</option>
                </select>   
              </div>
              <div class="col-lg-12">
                <input type="number"  name="phone"  value="{{ Auth::user()->phone }}" placeholder="Enter Your Phone Number" />
              </div>
              
              <div class="col-lg-12">
                <Textarea name="about"  value="{{ Auth::user()->about }}" placeholder="Tell Us About Yourself"></Textarea>
              </div>
              
              <div class="col-lg-12">
                <button type="submit" class="btn btn-success reg-button">Update</button>
              </div>
            
            </div>
          </form>
        </div>
      </div>
    </section>

@endsection