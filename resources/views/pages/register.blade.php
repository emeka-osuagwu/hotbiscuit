@extends('master')

@section('content')

  @include('pages.sections.header')
  
    <section class="col-lg-12 section-1 container registration-section-1" id="home-container">
     
    <form accept="{{ Url('register') }}" method="post">
      <div class="registration-section-1__content col-lg-12">
        <div class="center logo-holder"><img src="{{ asset('asset/images/hot-biscuit-logo.png') }}"></div>
        <div class="registration-section-1__content__card center card welcome-card">
          <div class="registration-section-1__content__card__image-holder"></div>
          <div class="registration-section-1__content__card__main-copy">
            <h2>Create your profile before you proceed</h2>
          </div>

          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif


              @if (Session::has('register-sucsses'))
                <script>
                  swal({
                    title: "Account Created :)",
                    type: "success",
                    confirmButtonColor: "#298829",
                    confirmButtonText: "OK",

                    closeOnConfirm: false,
                    closeOnCancel: false
                  },
                  function(isConfirm)
                  {
                    if (isConfirm) {
                        window.location="/login";
                      }
                  });
                </script>
              @endif  

          <div class="registration-section-1__content__card__form-holder">
            
            <div class="col-lg-12 ">
              <input placeholder="Email" name="email" type="email" value="{{ old('email') }}" required />
            </div>

            <div class="col-lg-12">
              <input type="Password" name="password" placeholder="Your Password" required />
            </div>
            <!-- 
            <div class="col-lg-12">
              <input type="password" placeholder="Confirm Password" />
            </div>
             -->
            <div class="col-lg-12">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>

            <div class="col-lg-12">
              <a href="{{ Url('login') }}" class="btn btn-success">Login</a>
            </div>
          
          </div>
        </div>
      </div>

      </form>
    </section>

@endsection