<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Πρόγραμμα</title>
    @include('includes.css')
</head>
@include('includes.navbar')
<section class="center-section">
    <form class="schedule-form" action="{{ route('schedule') }}" method="POST">
        {!! csrf_field() !!}
        <h3>Ημερομηνία και Ώρα που είμαστε ανοικτά.</h3>
        <input value="{{ $schedule['schedule'] }}" required class="schedule-input" type="text" name="schedule">
        <button type="submit">Αποθήκευση</button>
    </form>
    @if (session('success_msg'))
        <div class="alert alert-success text-center" role="alert">{!! session('success_msg') !!}</div>
    @endif
</section>

<body>

</body>

</html>
