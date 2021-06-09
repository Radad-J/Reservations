<?php

namespace App\Http\Controllers;

use App\Models\Show;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $shows = Show::all();

        return view('welcome', [
            'shows' => $shows
        ]);
    }
}
