<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'login'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:25',
            'confirm-password' => 'required|same:password'
        ]);

        unset($validateData['confirm-password']);

        User::create($validateData);

        // $request->session()->flash('succes', 'Registrasi berhasil! silahkan login');

        return redirect('/login')->with('succes','Registrasi berhasil! silahkan login');
    }
}
