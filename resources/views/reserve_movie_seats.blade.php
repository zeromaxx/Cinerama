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
    <section class="center-section">
        <form class="movie-form-single" action="{{ route('reserve_seats_post') }}" method="POST">
            <h2 class="movie-header">{{ $movie->title }}</h2>
            {!! csrf_field() !!}
            <input type="hidden" id="movie_seats" name="movie_seats" value="" />
            <input type="hidden" name="movie_id" value="{{ $movie['id'] }}" />
            <input type="hidden" class="showtime" name="showtime" value="" />
            <div class="single-movie-container">
                <img src="{{ asset('images/' . $movie->image) }}" />

                <div class="seats-container">
                    @for ($i = 1; $i <= $movie['seats']; $i++)
                        <div data-id="{{ $i }}" class="seat">{{ $i }}</div>
                    @endfor
                </div>
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
                <input type="submit" value="Κράτηση" />
            </div>
        </form>
    </section>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="reserve-movie-error">{{ $error }}</div>
        @endforeach
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
