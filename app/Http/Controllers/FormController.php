<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class FormController extends Controller
{
    public function index() {
        $genres = Genre::all();
        return view('form', compact('genres'));
    }
}
