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
    <section class="center-section">
        <form class="insert-movie-form" action="{{ route('add_moviePost') }}" method="POST" enctype="multipart/form-data">
            <h2>Προσθήκη Ταινίας</h2>
            {{ csrf_field() }}
            <label for="title">Τίτλος</label>
            <input required name="title" type="text" />
            <label for="seats">Αριθμός Θέσεων</label>
            <input required name="seats" type="number">
            <div class="show_time_wrapper">
                <button class="add_show">Προσθήκη προβολής</button>
                <label for="date">Ημερομηνία</label>
                <input required name="show_date[]" type="date" />
                <label for="date">Ώρα</label>
                <input required name="show_time[]" type="time" />
            </div>
            <label for="image">Εικόνα</label>
            <input required name="image" type="file" />
            <input type="submit" value="Προσθήκη Ταινίας" />
        </form>
    </section>
    <script>
        const showTimeWrapper = document.querySelector('.show_time_wrapper');
        const addShow = document.querySelector('.add_show');

        addShow.addEventListener('click', (e) => {
            e.preventDefault();
            showTimeWrapper.insertAdjacentHTML("beforeend", `<label for="date">Ημερομηνία</label> <input required name="show_date[]" type="date" /> <label for="date">Ώρα</label>
         <input required name="show_time[]" type="time" />`);
        })
    </script>
</body>

</html>
