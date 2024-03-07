<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    public function home() {

        $categories = Category::all();
        $featuredEvents = Event::inRandomOrder()->limit(6)->get();

        return view('home' , compact('categories' , 'featuredEvents'));

    }
    public function adminDashboard()
    {
        $categoryCount = Category::count();
        $eventCount = Event::count();
        $userCount = User::count();

        return view('dashboard', compact('categoryCount', 'eventCount', 'userCount'));
    }
    public function show($event)
    {
        // Retrieve the event details from the database
        $event = Event::findOrFail($event);

        // Pass the event details to the view
        return view('event', compact('event'));
    }
    
}
