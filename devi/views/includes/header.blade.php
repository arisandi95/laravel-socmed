<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Sands book</a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      @if( Auth::user() )
      <a class="nav-item nav-link" href="{{route('dashboard')}}">Dashboard</a>
      <a class="nav-item nav-link" href="{{route('account')}}">Account</a>
      <a class="nav-item nav-link" href="{{route('logout')}}">Logout</a>
      @endif
    </div>
  </div>
</nav>