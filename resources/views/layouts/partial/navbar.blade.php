<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo">Dashboard</a>
      </div>

      <div class="collapse navbar-collapse justify-content-end">

        <ul class="navbar-nav">


          <li class="nav-item dropdown">
            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
                Account
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
              document.getElementById('form-list').submit();">Log out</a>
              <form id="form-list" action="{{route('logout')}}" method="POST">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
