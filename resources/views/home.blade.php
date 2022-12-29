<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Αρχική</title>
    @include('includes.css')
</head>

<body>
  <nav>
    <div class="navbar">
        <h2><a href="">Cinerama</a></h2>
        <ul class="navbar-links">
            <li><a href="">Εισαγωγή Ταινίας</a></li>
            <li><a href="">Θέσεις</a></li>
            <li><a href="">Κρατήσεις</a></li>
            <li><a href="">Κράτηση</a></li>
        </ul>
        <h4><a href="{{ route('home') }}">Είσοδος</a></h4>
    </div>
  </nav>
  <div class="main-img-container">
    <img class="main-img" src="{{ asset('images/main.png') }}" alt="">
  </div>
</body>

</html>
