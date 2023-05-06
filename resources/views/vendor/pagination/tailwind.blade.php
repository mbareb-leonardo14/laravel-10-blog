@if ($paginator->hasPages())
  <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">

    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">

      <div>
        <span class="relative z-0 inline-flex rounded-md">
          {{-- Previous Page Link --}}
          @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
              class="mr-3 flex h-10 w-10 items-center justify-center text-sm font-semibold text-gray-800 hover:text-gray-900"
              aria-label="{{ __('pagination.previous') }}">
              <i class="fas fa-arrow-left mr-2"></i>
              Prev
            </a>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
              <span aria-disabled="true">
                <span
                  class="relative -ml-px inline-flex cursor-default items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700">{{ $element }}</span>
              </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
              @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                  <span aria-current="page">
                    <span
                      class="flex h-10 w-10 items-center justify-center bg-blue-800 text-sm font-semibold text-white hover:bg-blue-600">{{ $page }}</span>
                  </span>
                @else
                  <a href="{{ $url }}"
                    class="flex h-10 w-10 items-center justify-center text-sm font-semibold text-gray-800 hover:bg-blue-600 hover:text-white"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                  </a>
                @endif
              @endforeach
            @endif
          @endforeach

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
              class="ml-3 flex h-10 w-10 items-center justify-center text-sm font-semibold text-gray-800 hover:text-gray-900"
              aria-label="{{ __('pagination.next') }}">
              Next
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          @else
            <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
              <span
                class="relative -ml-px inline-flex cursor-default items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-gray-500"
                aria-hidden="true">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
                </svg>
              </span>
            </span>
          @endif
        </span>
      </div>
    </div>
  </nav>
@endif
