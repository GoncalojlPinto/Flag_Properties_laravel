<?php

namespace App\Http\Controllers;

use app\Models\Favorite;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function allFavorites(Property $property)
    {



        
    $favorites = DB::table('properties')
    ->select('properties.*')
    ->join('favorites', 'properties.id', '=', 'favorites.property_id')
    ->get();



    return view('user.myfavorites', ['favorites' => $favorites]);
}

}
