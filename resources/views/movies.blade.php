<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('includes.css')
</head>

<body>
    @include('includes.navbar')
    <h1 class="playing-now-header">Παίζονται τώρα</h1>
    <section class="center-section">

        <form class="movies-form">
            {!! csrf_field() !!}

            @foreach ($movies as $movie)
                <div>
                    <a style="color: red" href="reserve_movie_seats/{{ $movie['id'] }}">
                        <img src="images/{{ $movie['image'] }}" />
                    </a>
                </div>
            @endforeach
        </form>
    </section>
</body>

</html>
