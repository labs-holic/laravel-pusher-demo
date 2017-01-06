<?php

namespace App\Http\Controllers;

use App\Events\Announcement;
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
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function announcement(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'message' => 'required',
        ]);

        broadcast(new Announcement($request->all()));

        return ['message' => 'Notification created succefully'];
    }
}
