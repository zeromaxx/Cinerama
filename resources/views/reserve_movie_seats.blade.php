<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ταινία</title>
    @include('includes.css')
</head>

<body>
    @include('includes.navbar')
    <form action="{{ route('reserve_seats_post') }}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" id="movie_seats" name="movie_seats" value="" />
        <input type="hidden" name="movie_id" value="{{ $movie['id'] }}" />
        <input type="hidden" class="showtime" name="showtime" value="" />
        <h2>Ταινία</h2>
        <p>{{ $movie->title }}</p>
        <div class="seats-container">
            @for ($i = 1; $i <= $movie['seats']; $i++)
                <div data-id="{{ $i }}" class="seat">{{ $i }}</div>
            @endfor
        </div>
        @php
            if (stripos($movie['showtime'], '|') !== false) {
                $showtime = explode('|', $movie['showtime']);
            } else {
                $showtime = [$movie['showtime']];
            }
        @endphp

        <div class="showtime-container">
            @foreach ($showtime as $time)
                <div class="time" style="border: 1px solid black">{{ $time }}</div>
            @endforeach
        </div>
        <input type="submit" value="Κράτηση" />
    </form>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="">{{ $error }}</div>
        @endforeach
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
