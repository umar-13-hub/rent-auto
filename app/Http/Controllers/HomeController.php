<?php

namespace App\Http\Controllers;

use App\Models\Cars;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Cars::orderBy('price', 'DESC')
        ->limit(4)
        ->get();
        return view('home', [
            'cars' => $cars
        ]);
    }
}
