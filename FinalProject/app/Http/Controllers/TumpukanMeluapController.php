<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Profile;

class TumpukanMeluapController extends Controller
{
    public function index() {
        $page = "index";
        return view('index', ['page'=> $page]);
    }
}
