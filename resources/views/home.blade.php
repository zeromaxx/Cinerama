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
    @include('includes.navbar')
    <div class="main-img-container">
        <img class="main-img" src="{{ asset('images/main.png') }}" alt="">
    </div>
</body>

</html>
