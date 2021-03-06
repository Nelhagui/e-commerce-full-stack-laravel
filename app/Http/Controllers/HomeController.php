<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Category;

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
        $services = Service::paginate(4);
        $categories = Category::all();
        // dd($services);
        return view('home')
        ->with('services', $services)
        ->with('categories', $categories);
        
    }
}
