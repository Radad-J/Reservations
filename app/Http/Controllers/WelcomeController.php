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
        $shows = Show::orderBy('title')->paginate(3);

        return view('welcome', [
            'shows' => $shows
        ]);
    }
}
