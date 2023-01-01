  <nav>
      <div class="navbar">
          <h2><a href="{{ route('home') }}">Cinerama</a></h2>
          @if (Auth::check() && Auth::user()->role == 'admin')
              <ul class="navbar-links">
                  <li><a href="{{ route('add_movie') }}">Εισαγωγή Ταινίας</a></li>
                  <li><a href="">Θέσεις</a></li>
                  <li><a href="">Κρατήσεις</a></li>
                  <li><a href="{{ route('reservation') }}">Κράτηση</a></li>
              </ul>
          @endif
          @if (!Auth::check())
              <h4><a href="{{ route('login') }}">Είσοδος</a></h4>
          @else
              <h4><a href="{{ route('logout') }}">Αποσύνδεση : {{ Auth::user()->username }}</a></h4>
          @endif
      </div>
  </nav>
