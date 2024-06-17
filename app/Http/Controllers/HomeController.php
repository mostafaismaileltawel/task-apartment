<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Apartment;
use Illuminate\Support\Carbon;
class HomeController extends Controller
{
public function index(Request $request)
{  
    $lastVisitedPages = json_decode($request->cookie('last_visited_pages', '[]'), true);
    $apartments = Apartment::all();
    return view('dashboard', compact('apartments','lastVisitedPages'));
}
public function show($id)
{
    $apartment = Apartment::findOrFail($id);
        return view('show', compact('apartment'));

}

}
