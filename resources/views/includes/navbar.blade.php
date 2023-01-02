  <nav>
      <div class="navbar">
          <h2><a href="{{ route('home') }}">Cinerama</a></h2>
          <ul class="navbar-links">
              @if (Auth::check() && Auth::user()->role == 'admin')
                  <li><a href="{{ route('add_movie') }}">Προσθήκη Ταινίας</a></li>
                  <li><a href="{{ route('show_reservations') }}">Κρατήσεις</a></li>
              @endif
              <li><a href="{{ route('movies') }}">Ταινίες</a></li>
          </ul>
          @if (!Auth::check())
              <h4><a href="{{ route('login') }}">Είσοδος</a></h4>
          @else
              <h4><a href="{{ route('logout') }}">Αποσύνδεση : {{ Auth::user()->username }}</a></h4>
          @endif
      </div>
  </nav>
