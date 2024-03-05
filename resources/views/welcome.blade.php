<x-main>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto">
            <form id="searchForm" action="{{ route('events.searchResult') }}" method="GET" class="mb-4">
                <div class="flex items-center">
                    <input type="text" id="searchInput" name="query" placeholder="Type to search..."
                        class="border border-gray-300 rounded-l px-4 py-2 w-full">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r">
                        Search
                    </button>
                </div>
                <ul id="suggestionList" class="mt-2">
                </ul>
            </form>
        </div>
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
