<?php

namespace App\Http\Controllers;

use App\Articale;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles  = Articale::with('Category')->paginate(3);
        return view('home', [
            'articles' => $articles
        ]);
    }
}
