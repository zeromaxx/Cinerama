  <nav>
      <div class="navbar">
          <h2><a href="{{ route('home') }}">Cinerama</a></h2>
          <ul class="navbar-links">
              @if (Auth::check() && Auth::user()->role == 'admin')
                  <li><a class="{{ request()->is('add_movie') ? 'active-link' : '' }}" href="{{ route('add_movie') }}">Προσθήκη Ταινίας</a></li>
                  <li><a class="{{ request()->is('schedule') ? 'active-link' : '' }}" href="{{ route('schedule') }}">Διαχείρηση Ημερομηνίων</a></li>
                  <li><a class="{{ request()->is('show_reservations') ? 'active-link' : '' }}" href="{{ route('show_reservations') }}">Κρατήσεις</a></li>
                  <li><a class="{{ request()->is('movies') ? 'active-link' : '' }}" href="{{ route('movies') }}">Ταινίες</a></li>
              @endif
              @if (Auth::check() && Auth::user()->role == 'customer')
                  <li><a class="{{ request()->is('my_reservations') ? 'active-link' : '' }}" href="{{ route('my_reservations') }}">Οι Κρατήσεις μου</a></li>
                  <li><a class="{{ request()->is('movies') ? 'active-link' : '' }}" href="{{ route('movies') }}">Ταινίες</a></li>
              @endif
          </ul>
          @if (!Auth::check())
              <h4><a href="{{ route('login') }}">Είσοδος</a></h4>
          @else
              <h4><a href="{{ route('logout') }}">Αποσύνδεση : {{ Auth::user()->username }}</a></h4>
          @endif
      </div>
  </nav>
