<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinerama - Είσοδος</title>
    @include('includes.css')
</head>

<body>
    @include('includes.navbar')
    <section class="center-section">
        <form class="login-form" action="{{ route('authorize_login') }}" method="POST">
            {{ csrf_field() }}
            @if (session('error_message'))
                <div class="alert-danger">{!! session('error_message') !!}</div>
            @endif
            <label for="username">Όνομα Χρήστη</label>
            <input required name="username" type="email" />
            <label for="password">Κωδικός</label>
            <input required name="password" type="password" />
            <button type="submit">Είσοδος</button>
            <div style="margin-top: 1rem">
                <p>Δεν έχετε λογαριασμό ?</p>
                <a class="register-link" href="{{ route('register') }}">Εγγραφή</a>
            </div>
        </form>
        @if (session('success_msg'))
            <div class="alert-success" role="alert">{!! session('success_msg') !!}</div>
            <script>
                setTimeout(() => {
                    document.querySelector('.alert-success').style.display = 'none';
                }, 3000);
            </script>
        @endif
    </section>
</body>

</html>
