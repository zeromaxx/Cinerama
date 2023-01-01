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
    <form action="" method="POST" style="width: 100%;border:1px solid black">
        {!! csrf_field() !!}
        <h2>Παίζονται τώρα</h2>
        @foreach ($movies as $movie)
            <img width="100px" src="images/{{ $movie['image'] }}" />
            <p>{{ $movie['title'] }}</p>
            <div class="seats-container">
                @for ($i = 0; $i <= $movie['seats']; $i++)
                    <div>{{ $i }}</div>
                @endfor
            </div>
            @php
                if (stripos($movie['showtime'], '|') !== false) {
                    $movies = explode('|', $movie['showtime']);
                } else {
                    $movies = [$movie['showtime']];
                }
            @endphp

            @foreach ($movies as $movie)
                <div class="row mb-2">
                    <div class="col-6 offset-3 view">{{ $movie }}</div>
                </div>
            @endforeach
        @endforeach
    </form>
</body>

</html>
