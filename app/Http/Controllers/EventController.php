<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        if (!auth()->user()->hasPermissionTo('manage organizer event')) {
            abort(403, 'Unauthorized action.');
        }

        // Fetch all events
        $events = Event::where('validated', false)->get();

        // Pass events to the view
        return view('admin.events.index', compact('events'));
    }
    public function indexOrg()
    {
        // Retrieve the logged-in user
        $user = auth()->user();

        // Check if the user has permission to manage organizer events
        if (!$user->hasPermissionTo('manage organizer event')) {
            abort(403, 'Unauthorized action.');
        }

        // Fetch events associated with the logged-in user
        $events = Event::where('organizer_id', $user->id)->where('validated', false)->get();

        // Pass events to the view
        return view('organizer.events.index', compact('events'));
    }
    public function validateEvent(Event $event)
    {
        if (!auth()->user()->hasPermissionTo('approve events')) {
            abort(403, 'Unauthorized action.');
        }
        // Validate the event
        $event->update(['validated' => true]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Event has been validated.');
    }
    // Method to show the event creation form
    public function create()
    {
        $categories = Category::all();

        return view('organizer.events.create', compact('categories'));
    }

    // Method to store a new event
    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('create events')) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'image' => 'required|',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'available_seats' => 'required|integer|min:0',
            'category' => 'required|exists:categories,id',
            'auto_accept_reservation' => 'boolean',

        ]);

        $validated['organizer_id'] = auth()->id();
        $imagePath = $request->file('image')->store('event_images', 'public');
        $validated['image'] = $imagePath;

        $validated['auto_accept_reservation'] = $request->has('auto_accept_reservation') && $request->input('auto_accept_reservation') === '1';

        $event = Event::create($validated);

        $event->category()->associate($request->category)->save();

        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully.');
    }


    // Method to show the event edit form
    public function edit(Event $event)
    {
        if (!auth()->user()->hasPermissionTo('edit events')) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();

        return view('organizer.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        if (!auth()->user()->hasPermissionTo('edit events')) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'available_seats' => 'required|integer|min:0',
            'category' => 'required|exists:categories,id',
            'auto_accept_reservation' => 'boolean',
        ]);

        $event->update($validated);

        return redirect()->route('organizer.events.index')->with('success', 'Event updated successfully.');
    }

    // Method to delete an event
    public function destroy(Event $event)
    {
        if (!auth()->user()->hasPermissionTo('delete events')) {
            abort(403, 'Unauthorized action.');
        }
        $event->delete();

        return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully.');
    }
    public function searchAjax(Request $request)
    {
        $query = $request->input('query');

        // Perform a search query based on the input query
        $events = Event::where('title', 'like', '%' . $query . '%')->get();

        // Return the results as JSON
        return response()->json($events);
    }
    public function searchResult(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category');

        $eventsQuery = Event::query();
        if (!empty($query)) {
            $eventsQuery->where('title', 'like', "%$query%");
        }
        if (!empty($categoryId)) {
            $eventsQuery->where('category_id', $categoryId);
        }

        $events = $eventsQuery->paginate(10);

        $categories = Category::all();

        $selectedCategory = $categoryId;

        return view('searchResult', compact('events', 'query', 'categories', 'selectedCategory'));
    }


}
