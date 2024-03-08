<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReservationController extends Controller
{
    public function index()
    {
        // Check if the user has permission to manage reservations
        if (!auth()->user()->hasPermissionTo('manage reservations')) {
            abort(403, 'Unauthorized action.');
        }

        $reservations = Reservation::where('accepted', false)->get();
        return view('organizer.reservations.index', compact('reservations'));
    }

    public function indexUsr()
    {
        // Retrieve the logged-in user
        $user = auth()->user();

        $reservations = Reservation::where('user_id', $user->id)
            ->get();

        return view('user.reservation.index', compact('reservations'));
    }


    public function reserve(Event $event)
    {
        if (!auth()->user()->hasPermissionTo('make reservation')) {
            abort(403, 'Unauthorized action.');
        }

        $existingReservation = Reservation::where('event_id', $event->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingReservation && $existingReservation->accepted) {
            return view('reservation.already_reserved_accepted', ['event' => $event, 'reservation' => $existingReservation]);
        } elseif ($existingReservation) {
            return view('reservation.already_reserved');
        } else {
            $accepted = $event->auto_accept_reservation;
            $reservation = Reservation::create([
                'event_id' => $event->id,
                'user_id' => auth()->id(),
                'accepted' => $accepted,
            ]);

            $qrCode = QrCode::size(200)->generate($reservation->toJson());

            $qrCodePath = 'qrcodes/' . $reservation->id . '.png';
            QrCode::size(200)->format('png')->generate($reservation->toJson(), public_path($qrCodePath));

            $reservation->update(['qr_code' => $qrCodePath]);
            $event->decrement('available_seats');

            if ($event->auto_accept_reservation) {
                return view('reservation.auto_accepted', ['reservation' => $reservation]);
            } else {
                return view('reservation.manual_review', ['event' => $event, 'reservation' => $reservation]);
            }
        }
    }


    public function destroy(Reservation $reservation)
    {
        // Check if the user has permission to cancel reservations
        if (!auth()->user()->hasPermissionTo('cancel reservations')) {
            abort(403, 'Unauthorized action.');
        }

        $reservation->delete();

        return redirect()->route('user.reservations.index')->with('success', 'Event Cancelled successfully.');
    }

    public function accept(Reservation $reservation)
    {
        // Check if the user has permission to accept reservations
        if (!auth()->user()->hasPermissionTo('accept reservations')) {
            abort(403, 'Unauthorized action.');
        }

        // Update the reservation record to mark it as accepted
        $reservation->update([
            'accepted' => true,
        ]);

        // Optionally, you can redirect back to the reservations index page
        return redirect()->route('organizer.reservations.index')->with('success', 'Reservation accepted successfully.');
    }
}
