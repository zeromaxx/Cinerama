<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinerama - Εγγραφή</title>
    @include('includes.css')
</head>

<body>
    @include('includes.navbar')
    <section class="center-section">
        <form class="login-form" action="{{ route('register_user') }}" method="POST">
            {{ csrf_field() }}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert" role="alert">{{ $error }}</div>
                @endforeach
            @endif
            <label for="username">Όνομα Χρήστη</label>
            <input required name="username" type="email" />
            <label for="password">Κωδικός</label>
            <input required name="password" type="password" />
            <button type="submit">Εγγραφή</button>
            <div style="margin-top: 1rem">
                <p>Έχετε λογαριασμό ?</p>
                <a class="register-link" href="{{ route('login') }}">Είσοδος</a>
            </div>
        </form>
    </section>
</body>

</html>
