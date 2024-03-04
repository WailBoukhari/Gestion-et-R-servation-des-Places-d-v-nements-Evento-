<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
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
        if (!auth()->user()->hasPermissionTo('manage organizer event')) {
            abort(403, 'Unauthorized action.');
        }
        // Fetch all events
        $events = Event::all();

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
        return view('organizer.events.create');
    }

    // Method to store a new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'available_seats' => 'required|integer|min:0',
        ]);

        $validated['organizer_id'] = auth()->id();

        Event::create($validated);

        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully.');
    }

    // Method to show the event edit form
    public function edit(Event $event)
    {
        return view('organizer.events.edit', compact('event'));
    }

    // Method to update an existing event
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'available_seats' => 'required|integer|min:0',
        ]);

        $event->update($validated);

        return redirect()->route('organizer.events.index')->with('success', 'Event updated successfully.');
    }

    // Method to delete an event
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully.');
    }
}
