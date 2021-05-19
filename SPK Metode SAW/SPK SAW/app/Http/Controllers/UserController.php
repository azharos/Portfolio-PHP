<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->username;
        $pass = $request->password;

        $user = User::where('username', $user)->first();

        // Cek Username
        if ($user) {
            // Cek Password
            if (Hash::check($pass, $user->password)) {

                // Session
                $request->session()->put('username', $user->username);

                return redirect('/');
            } else {
                return redirect('/login')->with('status', 'Password Salah !!!');
            }
        } else {
            return redirect('/login')->with('status', 'Username Salah !!!');
        }

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function login(Request $request)
    {
        if ($request->session()->has('username')) {
            return redirect('/');
        }
        return view('auth/login');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect('/login');
    }
}
