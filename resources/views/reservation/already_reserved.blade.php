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
                                <div class="card-body">
                                    <p class="lead text-center mb-4">Your reservation request has been received. It will
                                        be reviewed by the event organizer.</p>
                                    <div class="text-center">
                                        <div>
                                            <!-- Button to go to user's reservations -->
                                            <form action="{{ route('user.reservations.index') }}" method="GET"
                                                class="d-inline">
                                                <button type="submit" class="btn btn-primary">
                                                    Go To Your Reservation
                                                </button>
                                            </form>
                                            <!-- Button to go to searchResults -->
                                            <form action="{{ route('events.searchResult') }}" method="GET"
                                                class="d-inline">
                                                <button type="submit" class="btn btn-secondary">
                                                    Go To Search Results
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
