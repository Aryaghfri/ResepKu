<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorit;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{

    public function index()
{
    return view('favorit.index');
}

    
}
