<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

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

        // . ' ' . $request->input('show_time')
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

        $request->session()->flash('success_msg', 'Επιτυχής προσθήκη ταινίας.' . $movie);
        return view('home');
    }

    public function reservation(Request $request)
    {
        $movies = Movie::all();
        return view('reservation', ['movies' => $movies]);
    }
}
