<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_user(Request $request)
    {
        $validation = [
            'unique' => 'Το όνομα χρήστη υπάρχει ήδη.',
            'min' => 'Ο κωδικός πρέπει να έχει 4 η περισσότερα ψηφία'
        ];

        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:4'
        ], $validation);

        $username = trim($request->input('username'));

        $user = User::create([
            'username' => $username,
            'role' => 'customer',
            'password' => Hash::make($request->input('password')),
        ]);

        if (!empty($user)) {
            $request->session()->flash('success_msg', 'Ο λογαριασμός δημιουργήθηκε με επιτυχία. Μπορείτε να πραγματοποιήσετε είσοδο.');
            return redirect()->route('login');
        }
        return redirect()->route('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function authorize_login(Request $request)
    {
        $attributes = [
            'username' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->except(['_token']), $attributes);
        if ($validator->fails()) {
            return Redirect::to('login')->withErrors($validator);
        }

        $username = $request->input('username');
        $password = $request->input('password');

        $credentials = [
            'username' => $username,
            'password' => $password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            $request->session()->flash('error_msg', 'Τα στοιχεία που δώσατε είναι λάθος');
            return redirect()->back();
        }
    }
}
