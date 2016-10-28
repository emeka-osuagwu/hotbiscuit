
<header>
  <nav class="navbar navbar-default navbar-fixed-top" id="main-navigation">
    <div class="container-fluid">
      <div class="navbar-header">
          
        <a class="navbar-brand" href="index.html">
          <img alt="Brand" src="{{ asset('asset/images/hot-biscuit-logo.png') }}">
        </a>
        <div id="nav-menu-holder" onclick='show_modal()'>
              <img src="{{ asset('asset/images/menu bar.png') }}">
        </div>  
      </div>
      
    </div>
  </nav>
<!--   <div class="modal modal-image-container col-lg-12">
        <div class="modal-image-holder">
          <div class="close-icon-holder" id="close-icon-holder">
          </div>
          <div class="modal-image">
            <img src="{{ asset('asset/images/burnt_beans.jpg') }}">
          </div>
        </div>
  </div> -->
  <div class="modal-menu-holder hide-modal">
    <div class="modal-menu">
      <div class="logo-holder">
        <img src="{{ asset('asset/images/hot-biscuit-logo.png') }}">
      </div>
      <div class="menu-links">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="registration.html">Registration Page</a></li>
          <li><a href="test-page.html">test-page</a></li>
          <li><a href="male-users-page.html">male-users-page</a></li>
          <li><a href="female-users-page.html">female-users-page</a></li>
        </ul>
    </div>
    </div>
    <div class="modal-left" onclick="close_modal()"></div>
  </div>
</header>