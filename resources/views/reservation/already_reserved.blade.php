<x-main>
    <x-slot name="header">
        <div class="container-fluid bg-primary">
            <div class="row">
                <div class="col">
                    <h2 class="font-weight-bold text-xl text-white text-center py-4">
                        Already Reserved
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-5 my-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card border-primary">
                        <div class="card-body">
                            <p class="lead text-center mb-4">You Already Made Your Reservation!</p>
                            <div class="text-center">
                                <p><strong>Event Name:</strong> {{ $reservation->event->title }}</p>
                                <p><strong>Start Time:</strong> {{ $reservation->event->start_time }}</p>
                                <p><strong>End Time:</strong> {{ $reservation->event->end_time }}</p>
                                <p><strong>Location:</strong> {{ $reservation->event->location }}</p>
                                <div class="text-center py-5">
                                    <img src="{{ asset($reservation->qr_code) }}" alt="QR Code" id="qr-code-image"
                                        class="w-48 h-48 m-auto shadow-lg rounded-lg">
                                </div>

                                <!-- Button to go to user's reservations -->
                                <form action="{{ route('user.reservations.index') }}" method="GET">
                                    <button type="submit" class="btn btn-primary">
                                        Go To Your Reservation
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
