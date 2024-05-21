<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Данные, которые мы хотим отобразить в представлении
        $userData = User::all(); // или какой-то массив данных из модели
        return view('auth', ['users' => $userData]);
    }
}