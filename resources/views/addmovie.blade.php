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
    <h2>Insert movies</h2>
    <form action="{{ route('add_moviePost') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="title">Τίτλος</label>
        <input name="title" type="text" />
        <br>
        <label for="">Εικόνα</label>
        <input name="image" type="file" />
        <br>
        <label for="seats">Αριθμός Θέσεων</label>
        <input name="seats" type="number">
        <br>
        <div class="show_time_wrapper">
            <button class="add_show">Προσθήκη προβολής</button>
            <input name="show_date[]" type="date" />
            <input name="show_time[]" type="time" />
        </div>
        <input type="submit" />
    </form>
    <script>
        const showTimeWrapper = document.querySelector('.show_time_wrapper');
        const addShow = document.querySelector('.add_show');

        addShow.addEventListener('click', (e) => {
            e.preventDefault();
            showTimeWrapper.insertAdjacentHTML("beforeend", `<input name="show_date[]" type="date" />
         <input name="show_time[]" type="time" />`);
        })
    </script>
</body>

</html>
