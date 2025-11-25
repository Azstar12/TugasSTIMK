<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class authController extends Controller
{
    public function index()
    {
        return view('autentikasi.login');
    }

    public function proses_login(Request $r)
    {
        $r->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'email yang anda masukan salah',
                'password.required' => 'password anda salah'
            ]
        );

        $data = [
            'email' => $r->email,
            'password' => $r->password
        ];

        if ($remember = $r->has('remember')) {
            $minutes = 60 * 24 * 30;
            cookie()->queue('email', $r->email, $minutes);
            cookie()->queue('password', $r->password, $minutes);
        } else {
            cookie()->forget('email');
            cookie()->forget('password');
        };

        if (Auth::attempt($data, $remember)) {

            return redirect()->route('admin.home')->with('success', 'anda berhasil login!');
        } else {
            return redirect()->route('login')->with('error', 'email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'anda berhasil logout');
    }
}
