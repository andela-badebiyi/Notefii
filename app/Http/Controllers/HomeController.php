<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function dashboard(Request $request)
    {

        if (Auth::check()) {
            return view('home', [
                'notes' => $request->user()->notes()->orderBy('updated_at', 'DESC')->paginate(6)
            ]);
        }
        return redirect()->route('welcome');
    }
}
