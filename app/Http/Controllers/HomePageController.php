<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {
        return view('homepage.index', ['properties' => Property::all()]);
    }


}
