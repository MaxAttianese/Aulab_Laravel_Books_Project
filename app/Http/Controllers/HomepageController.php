<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage() {

        $title = "Homepage";

        return view("Homepage.homepage", compact("title"));
    }
}
