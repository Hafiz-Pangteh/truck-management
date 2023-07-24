<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\Package;
use App\Models\postman;

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
        $trucks = Truck::all();
        $packages = Package::all();
        $postmen = postman::all();
        return view('home')->with(compact('trucks'))->with(compact('packages'))->with(compact('postmen'));
    }
}
