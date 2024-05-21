<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        // Validate the input fields
        $credentials = $request->validate([
          'tel' => 'required|string',
          'password' => 'required|string',
      ]);

      if (Auth::guard()->attempt($credentials)) {
        // Аутентификация прошла успешно
        return redirect()->route('home')->with('success', 'Авторизация прошла успешна');
      }

      // Аутентификация не удалась
      return back()->withErrors([
          'tel' => 'Неверные учетные данные',
      ]);
    }

    /**
     * Handle logout request.
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
