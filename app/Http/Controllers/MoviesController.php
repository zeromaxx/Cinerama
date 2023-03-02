<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Schedule;


class MoviesController extends Controller
{
    public function add_movie()
    {
        return view('addmovie');
    }
    public function add_moviePost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $title = trim($request->input('title'));
        $showTime = $request->input('show_date');
        $seats = $request->input('seats');

        for ($i = 0; $i < count($showTime); $i++) {
            $showTime[$i] .= ' ' . $request->input('show_time')[$i];
        }
        $views = implode('|', $showTime);
        $movie = new Movie();

        $movie->title = $title;
        $movie->image = $imageName;
        $movie->showtime = $views;
        $movie->seats = $seats;
        $movie->save();

        return redirect()->route('movies');
    }

    public function reserve_movie_seats($id)
    {
        if (Movie::where('id', $id)->exists()) {

            $movie = Movie::where('id', $id)->first();
            return view('reserve_movie_seats', ['movie' => $movie]);
        } else {
            return redirect('/')->with('id_not_found', 'Η ταινία δεν υπάρχει');
        }
    }

    public function movies()
    {
        $movies = Movie::all();
        return view('movies', ['movies' => $movies]);
    }

    public function reserve_seats_post(Request $request)
    {
        $movieId = $request->input('movie_id');
        $userId = auth()->user()->id;
        $reserved_seats = $request->input("movie_seats");
        $showtime = $request->input("showtime");

        if (empty($showtime)) {
            return back()->withErrors("Παρακαλώ διαλέχτε ημερομηνία")->withInput();
        }

        if (empty($reserved_seats)) {
            return back()->withErrors("Παρακαλώ διαλέχτε θέσεις")->withInput();
        }

        $reservation = new Reservation();
        $reservation->movie_id = $movieId;
        $reservation->user_id = $userId;
        $reservation->reserved_seats = $reserved_seats;
        $reservation->showtime = $showtime;



        $reservation->save();
        return back()->with('success', 'Το αίτημα κράτησης σας έγινε επιτυχώς!');
    }

    public function show_reservations()
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->route('login');
        }
        $query = Reservation::with('movie', 'user');
        $query->orderBy('created_at', 'DESC');
        $reservations = $query->get()->toArray();
        return view(
            'show_reservations',
            [
                'reservations' => $reservations,
            ]
        );
    }

    public function confirm_reservation(Request $request)
    {
        $movie = Movie::where('id', $request->input('movie_id'))->first();
        $array = explode("|", $request->input('reserved_seats'));
        $count = count($array);
        $movie->seats -= $count - 1;
        $movie->save();

        $reservation = Reservation::where('id', $request->input('confirmation_id'))->first();
        $reservation->confirm_reservation = 1;
        $reservation->save();

        return redirect()->route('show_reservations');
    }

    public function my_reservations()
    {
        $userId = auth()->user()->id;
        $reservations = Reservation::where('user_id', $userId)->get();
        return view('my_reservations', ['reservations' => $reservations]);
    }

    public function schedule(Request $request)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->route('login');
        }
        $schedule = Schedule::where('id', 1)->first();
        if ($request->method() == 'POST') {
            $schedule->schedule = $request->input('schedule');
            $schedule->save();
            $request->session()->flash('success_msg', 'Το πρόγραμμα αποθηκεύτηκε επιτυχώς');
        }
        return view(
            'schedule',
            ['schedule' => $schedule]
        );
    }
}
