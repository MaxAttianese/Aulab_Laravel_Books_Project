<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class ComixController extends Controller
{
    public function index() {

        $endpoint = "https://api.jikan.moe/v4/genres/anime";

        $gender = Http::get($endpoint)->json();

        $genders = $gender["data"];

        //dd($genders);

        return view("Comix.index", compact("genders"));

    }

    
    public function show($gender) {

        $endpoint = "https://api.jikan.moe/v4/anime?genres=" . $gender;

        $comixs = Http::get($endpoint)->json();

        $comixs = $comixs["data"];

        //dd($comixs);

        return view("Comix.show", compact("comixs"));

    }
}

// https://api.jikan.moe/v4/genres/anime

//  https://api.jikan.moe/v4/anime?genres=