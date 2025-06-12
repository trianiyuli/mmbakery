@if($users->hasPages())
<div class="bg-white px-3 sm:px-4 py-2 sm:py-3 flex items-center justify-between border-t border-gray-200">
    <div class="flex-1 flex justify-between sm:hidden">
        @if($users->onFirstPage())
        <span class="relative inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md text-gray-400 bg-white border border-gray-300">
            Previous
        </span>
        @else
        <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
            Previous
        </a>
        @endif

        @if($users->hasMorePages())
        <a href="{{ $users->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
            Next
        </a>
        @else
        <span class="ml-3 relative inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md text-gray-400 bg-white border border-gray-300">
            Next
        </span>
        @endif
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-xs sm:text-sm text-gray-700">
                Showing <span class="font-medium text-gray-900">{{ $users->firstItem() }}</span> to <span class="font-medium text-gray-900">{{ $users->lastItem() }}</span> of <span class="font-medium text-gray-900">{{ $users->total() }}</span> results
            </p>
        </div>
        <div>
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                @if($users->onFirstPage())
                <span class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-400">
                    <span class="sr-only">Previous</span>
                    <svg class="h-4 w-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
                @else
                <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <svg class="h-4 w-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                @endif

                @foreach(range(1, $users->lastPage()) as $i)
                    @if($i == $users->currentPage())
                    <span aria-current="page" class="z-10 bg-blue-600 border-blue-600 text-white relative inline-flex items-center px-3 py-2 border text-xs sm:text-sm font-medium">
                        {{ $i }}
                    </span>
                    @else
                    <a href="{{ $users->url($i) }}" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-3 py-2 border text-xs sm:text-sm font-medium">
                        {{ $i }}
                    </a>
                    @endif
                @endforeach

                @if($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <svg class="h-4 w-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                @else
                <span class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-400">
                    <span class="sr-only">Next</span>
                    <svg class="h-4 w-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
                @endif
            </nav>
        </div>
    </div>
</div>
@endif