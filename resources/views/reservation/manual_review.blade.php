<x-main>
    <x-slot name="header">
        <div class="container-fluid bg-primary">
            <div class="row">
                <div class="col">
                    <h2 class="font-weight-bold text-xl text-white text-center py-4">
                        Reservation Pending Review
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card border-primary">
                        <div class="card-body">
                            <p class="lead text-center mb-4">Your reservation request has been received. It will be
                                reviewed by the event organizer.</p>
                            <div class="text-center">
                                <form action="{{ route('user.reservations.index') }}" method="POST">
                                    @csrf
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
