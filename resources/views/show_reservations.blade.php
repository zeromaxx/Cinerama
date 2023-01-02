<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Κρατήσεις</title>
    @include('includes.css')
</head>

<body>
    @include('includes.navbar')
    <h2>Κρατήσεις</h2>
    <table>
        <tr>
            <th>Ταινία</th>
            <th>Ώρα Προβολής</th>
            <th>Όνομα Πελάτη</th>
            <th>Θέσεις</th>
            <th>Επιβεβαίωση Κράτησης</th>
        </tr>
         
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation['movie']['title'] }}</td>
                <td> {{ $reservation['showtime'] }}</td>
                <td>{{ $reservation['user']['username'] }}</td>
                <td>{{ $reservation['reserved_seats'] }}</td>
                <td>{{ $reservation['reserved_seats'] }}</td>
                <td>
                    <form action="{{ route('confirm_reservation') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="confirmation_id" value="{{ $reservation['id'] }}">
                        <input type="hidden" name="reserved_seats" value="{{ $reservation['reserved_seats'] }}">
                        <input type="hidden" name="movie_id" value="{{ $reservation['movie_id'] }}">
                        @if ($reservation['confirm_reservation'] === 0)
                            <button type="submit">Επιβεβαίωση</button>
                        @else
                            <p>Επιβεβαιώθηκε</p>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
