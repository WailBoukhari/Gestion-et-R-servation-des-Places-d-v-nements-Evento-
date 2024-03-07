<x-main>
    <!-- Page Banner Start -->
    <div class="section page-banner-section">
        <div class="shape-2"></div>
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Page Banner Content Start -->
                        <div class="page-banner text-center">
                            <h2 class="title">{{ $event->title }}</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item active" aria-current="page">Event Single</li>
                            </ul>
                        </div>
                        <!-- Page Banner Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->

    <!-- Event Single Start -->
    <div class="meeta-event-single section-padding">
        <div class="container">
            <div class="meeta-event-single-wrap">
                <div class="row">

                    <div class="col-lg-8">
                        <!-- Event Single Content Start -->
                        <div class="event-single-content">
                            <!--  Start -->
                            <div class="meeta-video-section-2">

                                <div class="video-img text-center"
                                    style="background-image: url({{ asset($event->image) }};">
                                    <!-- Section Title Start -->
                                    <div class="meeta-section-title-2 section-title-4">
                                        <h2 class="main-title">{{ $event->title }}</h2>
                                    </div>
                                    <!-- Section Title End -->

                                </div>

                            </div>
                            <!-- Video End -->
                            <p>{{ $event->description }}</p>
                            <div class="event-single-item">
                                <h3 class="title">Event Sponsor</h3>
                                <div class="meeta-event-sponsors-3">
                                    <!-- Sponsor Start -->

                                    <div class="meeta-sponsor-wrap">
                                        <div class="row">

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="meeta-sponsor-logo">
                                                    <a href="#"><img src="{{ asset('images/logo-sm-1.png') }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="meeta-sponsor-logo">
                                                    <a href="#"><img src="{{ asset('images/logo-sm-2.png') }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="meeta-sponsor-logo">
                                                    <a href="#"><img src="{{ asset('images/logo-sm-3.png') }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="meeta-sponsor-logo">
                                                    <a href="#"><img src="{{ asset('images/logo-sm-4.png') }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="meeta-sponsor-logo">
                                                    <a href="#"><img src="{{ asset('images/logo-sm-5.png') }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="meeta-sponsor-logo">
                                                    <a href="#"><img src="{{ asset('images/logo-sm-6.png') }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sponsor End -->
                                </div>
                            </div>
                        </div>
                        <!-- Event Single Content End -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Event Single Sidebar Start -->
                        <div class="event-single-sidebar">
                            <div class="btn-price">
                                <form action="{{ route('events.reserve', $event) }}" method="POST">
                                    @csrf   
                                    <button type="submit" class="btn btn-primary p-3">Get Ticket Now</button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-item">

                            <div class="event-details">
                                <h3 class="sidebar-title">Details</h3>
                                <ul>
                                    <li>
                                        <h5 class="title">Start:</h5>
                                        <p>{{ $event->start_time->format('F j, Y @ h:i A') }}</p>
                                    </li>
                                    <li>
                                        <h5 class="title">End:</h5>
                                        <p>{{ $event->end_time->format('F j, Y @ h:i A') }}</p>
                                    </li>
                                    <li>
                                        <h5 class="title">Location :</h5>
                                        <p>{{ $event->location }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Event Single Sidebar End -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Event Single End -->

</x-main>
