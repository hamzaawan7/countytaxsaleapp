<?php

namespace App\Http\Controllers;

use App\Legals;
use Illuminate\Http\Request;

class LegalsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function legalView()
    {
        $legal = $legal = Legals::find(1);
        return view('legal', compact('legal'));
    }
}
