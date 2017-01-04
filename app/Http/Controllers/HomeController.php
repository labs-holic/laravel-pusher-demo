<?php

namespace App\Http\Controllers;

use App\Notifications\Announcement;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcement = [
            'title' => 'Hola mundo!',
            'message' => 'Mensaje de prueba',
        ];

        Auth::user()->notify(new Announcement($announcement));

        return view('home');
    }
}
