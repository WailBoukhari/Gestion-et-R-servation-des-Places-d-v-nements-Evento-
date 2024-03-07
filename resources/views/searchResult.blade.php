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
                            <h2 class="title">Event List</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item active" aria-current="page">Event List</li>
                            </ul>
                        </div>
                        <!-- Page Banner Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->

    <!-- Event List Start -->
    <div class="meeta-event-list section-padding">
        <div class="container">
            <div class="meeta-event-list-wrap">
                <!-- Event List Top Bar Start -->
                <div class="event-list-top-bar">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="event-list-filter">
                                <form id="searchForm" action="{{ route('events.searchResult') }}" method="GET"
                                    class="mb-4">
                                    <div class="form-group">
                                        <select name="category" id="category" class="form-control"
                                            style="color: #fc097c;">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($selectedCategory == $category->id) selected @endif>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event List Top Bar End -->
                <!-- Event List Content Start -->
                <div class="event-list-content-wrap">
                    <div class="tab-content">
                        @foreach ($events as $event)
                            <div class="event-list-item event-list d-lg-flex align-items-center">
                                <div class="event-img">
                                    <a href="{{ route('event.show', $event->id) }}">
                                        <img src="{{ asset($event->image) }}" alt=""
                                            class="img-fluid rounded w-5">
                                    </a>
                                </div>
                                <div class="event-list-content">
                                    <div class="event-price">
                                        <span class="cat">{{ $event->category->name }}</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ route('event.show', $event->id) }}">{{ $event->title }}</a>
                                    </h3>
                                    <div class="meta-data">
                                        <span><i class="fas fa-map-marker-alt"></i>
                                            {{ $event->start_time->format('h:i A') }} -
                                            {{ $event->end_time->format('h:i A') }}
                                        </span>
                                        <span><i class="fas fa-map-marker-alt"></i> {{ $event->location }}</span>
                                    </div>
                                    <div class="event-desc">
                                        <p>{{ $event->description }}</p>
                                    </div>
                                    <form action="{{ route('events.reserve', $event) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="ticket-link">
                                            Make Reservation
                                        </button>
                                    </form>
                                </div>
                                <span
                                    class="event-time"><span><span>{{ $event->start_time->format('d') }}</span>{{ $event->start_time->format('M') }}</span></span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Event List Content End -->
                <div class="event-next-prev-btn text-center">
                    <div class="">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event List End -->

</x-main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Add change event listener to the category select input
        $('#category').on('change', function() {
            // Submit the form when the category selection changes
            $('#searchForm').submit();
        });
    });
</script>
