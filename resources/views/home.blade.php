<x-main>
    <div>
        <!-- Slider Section Start  -->
        <div class="meeta-hero-section-5 d-flex align-items-center"
            style="background-image: url({{ asset('images/bg/hero-5-bg.jpg') }});">
            <img class="image-1" src="{{ asset('images/hero-5-img-1.png') }}" alt="">
            <img class="image-2" src="{{ asset('images/hero-5-img-2.png') }}" alt="">
            <img class="shape-1" src="{{ asset('images/shape/hero-5-shape-1.png') }}" alt="">
            <img class="shape-2" src="{{ asset('images/shape/hero-5-shape-2.png') }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-content">
                            <div class="title-wrap text-center">
                                <h2 class="title" data-aos-delay="700" data-aos="fade-up">Find event</h2>
                                <h3 class="sub-title" data-aos-delay="800" data-aos="fade-up">Awesome event, conference
                                    & fest around you</h3>
                            </div>
                            <div class="search-form-wrap" data-aos-delay="900" data-aos="fade-up">
                                <div class="search-form-inner">
                                    <form class="search-form" id="searchForm"
                                        action="{{ route('events.searchResult') }}" method="GET">
                                        <div class="single-form">
                                            <label class="form-label"><i class="fas fa-search"></i> Event Title</label>
                                            <input type="text" id="searchInput" name="query"
                                                placeholder="Type to search...">
                                        </div>
                                        <div class="form-btn">
                                            <button type="submit" class="search-btn"><i
                                                    class="flaticon-loupe"></i></button>
                                        </div>
                                    </form>
                                    <ul id="suggestionList" class="list-group mt-2">
                                        <!-- Suggestions will be dynamically added here -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Section End -->

        <!-- Category Section Start -->
        <div class="meeta-category-section section-padding-02">
            <div class="container">
                <div class="meeta-category-wrap">
                    <!-- Section Title Start -->
                    <div class="meeta-section-title section-title-4 text-center">
                        <h2 class="main-title">Browse by <span class="title-shape-1">Category</span></h2>
                    </div>
                    <!-- Section Title End -->
                    <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-sm-2">
                        @foreach ($categories as $category)
                            <div class="col">
                                <!-- Category Item Start -->
                                <div class="category-item">
                                    <a href="#"><img src="{{ asset($category->image) }}"
                                            alt="{{ $category->name }}">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                </div>
                                <!-- Category Item End -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Section Start -->
        <div class="meeta-featured-section section-padding">
            <div class="shape-1"></div>
            <div class="shape-2" data-aos-delay="700" data-aos="zoom-in"></div>
            <div class="container">
                <div class="meeta-featured-wrap">
                    <!-- Section Title Start -->
                    <div class="meeta-section-title section-title-4 text-center">
                        <h2 class="main-title"><span class="title-shape-1">Featured </span>Events</h2>
                    </div>
                    <!-- Section Title End -->
                    <div class="meeta-event-featured">
                        <div class="row">
                            @foreach ($featuredEvents as $event)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <!-- Single Item Start -->
                                    <div class="single-item">
                                        <div class="featured-img">
                                            <a href="{{ route('event.show', $event->id) }}"><img
                                                    src="{{ $event->image }}" alt=""></a>
                                            <div class="top-meta">
                                                <span
                                                    class="date"><span>{{ $event->start_time->format('d') }}</span>{{ $event->start_time->format('M') }}</span>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <span class="category color-4">{{ $event->category->name }}</span>
                                            <h3 class="title"><a
                                                    href="{{ route('event.show', $event->id) }}">{{ $event->title }}</a>
                                            </h3>
                                            <span class="meta"><i class="fas fa-map-marker-alt"></i>
                                                {{ $event->location }}</span>
                                        </div>
                                    </div>
                                    <!-- Single Item End -->
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="featured-more text-center">
                        <a class="btn-2" href="{{ route('events.searchResult') }}">More Featured Events</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Section End -->

        <!-- Event Sponsors Start -->
        <div class="meeta-event-sponsors-4 meeta-event-sponsors-5 section-padding"
            style="background-image: url(assets/images/bg/sponsor-5-bg.jpg);">
            <div class="container">

                <!-- Section Title Start -->
                <div class="meeta-section-title section-title-4 text-center">
                    <h2 class="main-title">Event by <shape class="title-shape-1">Organizer</shape>
                    </h2>
                </div>
                <!-- Section Title End -->

                <!-- Sponsor Start -->
                <div class="meeta-sponsor-wrap">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <!-- Sponsor Box Start -->
                            <div class="meeta-sponsor-item-box sponsor-box-1">

                                <div class="meeta-sponsor-logo sponsor-logo-1">
                                    <a href="#"><img src="images/sponsors-5.png" alt=""></a>
                                </div>
                                <div class="meeta-sponsor-logo sponsor-logo-2">
                                    <a href="#"><img src="images/sponsors-9.png" alt=""></a>
                                </div>

                            </div>
                            <!-- Sponsor Box End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Sponsor Box Start -->
                            <div class="meeta-sponsor-item-box sponsor-box-2">

                                <div class="meeta-sponsor-logo sponsor-logo-3">
                                    <a href="#"><img src="images/sponsors-7.png" alt=""></a>
                                </div>
                                <div class="meeta-sponsor-logo sponsor-logo-4">
                                    <a href="#"><img src="images/sponsors-11.png" alt=""></a>
                                </div>

                            </div>
                            <!-- Sponsor Box End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Sponsor Box Start -->
                            <div class="meeta-sponsor-item-box sponsor-box-3">

                                <div class="meeta-sponsor-logo sponsor-logo-5">
                                    <a href="#"><img src="images/sponsors-6.png" alt=""></a>
                                </div>
                                <div class="meeta-sponsor-logo sponsor-logo-6">
                                    <a href="#"><img src="images/sponsors-10.png" alt=""></a>
                                </div>

                            </div>
                            <!-- Sponsor Box End -->
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <!-- Sponsor Box Start -->
                            <div class="meeta-sponsor-item-box sponsor-box-4">
                                <div class="meeta-sponsor-logo sponsor-logo-7">
                                    <a href="#"><img src="images/sponsors-8.png" alt=""></a>
                                </div>
                                <div class="meeta-sponsor-logo sponsor-logo-8">
                                    <a href="#"><img src="images/sponsors-12.png" alt=""></a>
                                </div>

                            </div>
                            <!-- Sponsor Box End -->
                        </div>
                    </div>
                </div>
                <!-- Sponsor End -->

            </div>
        </div>
        <!-- Event Sponsors End -->

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->
    </div>
</x-main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchForm').on('input', '#searchInput', function() {
            var searchQuery = $(this).val().trim();

            if (!searchQuery) {
                clearSuggestions();
                return;
            }

            $.ajax({
                url: '/events/search/ajax',
                method: 'GET',
                data: {
                    query: searchQuery
                },
                success: function(suggestions) {
                    displaySuggestions(suggestions);
                },
                error: function() {
                    console.error('AJAX request failed');
                }
            });
        });

        function displaySuggestions(suggestions) {
            var suggestionList = $('#suggestionList');
            suggestionList.empty();

            suggestions.forEach(function(suggestion) {
                var listItem = $('<li>').text(suggestion.title).addClass(
                    'border-t border-gray-200 px-4 py-2 cursor-pointer');
                listItem.on('click', function() {
                    $('#searchInput').val(suggestion.title);
                    clearSuggestions();
                });
                suggestionList.append(listItem);
            });
        }

        function clearSuggestions() {
            $('#suggestionList').empty();
        }
    });
</script>
