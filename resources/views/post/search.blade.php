<x-app-layout>
  <div class="container mx-auto flex flex-wrap py-6">

    <!-- Post Section -->
    <section class="w-full px-3 md:w-2/3">
      <div class="flex flex-col">
        @foreach ($posts as $post)
          <div>
            <a href="{{ route('view', $post) }}">
              <h2 class="mb-2 text-lg font-bold text-blue-500 sm:text-xl">
                {!! str_replace(
                    request()->get('q'),
                    '<span class="bg-red-600 text-white">' . request()->get('q') . '</span>',
                    $post->title,
                ) !!}
              </h2>
            </a>
            <div>
              {{ $post->shortBody() }}
            </div>
          </div>
          <hr class="my-4">
        @endforeach
      </div>
      {{ $posts->links() }}
    </section>

    {{-- Sidebar Section --}}
    <x-sidebar />

  </div>
</x-app-layout>
