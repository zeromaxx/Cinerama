<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Οι κρατήσεις μου</title>
    @include('includes.css')
</head>
<body>
    @include('includes.navbar')

      <table class="reservations-table">
        <tr>
            <th>Ταινία</th>
            <th></th>
            <th>Ώρα Προβολής</th>
            <th>Θέσεις</th>
        </tr>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation['movie']['title'] }}</td>
                <td><img width="50px" src="{{ asset('images/' . $reservation['movie']['image']) }}" /></td>
                <td>{{ $reservation['showtime'] }}</td>
                <td>{{ str_replace('|', ' ', $reservation['reserved_seats']) }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>