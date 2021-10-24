<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class UserController extends Controller
{

    public function myFavorites()
{
    $myFavorites = Auth::user()->favorites;

    return view('users.my_favorites', compact('myFavorites'));
}
}
