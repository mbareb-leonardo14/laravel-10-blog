<?php
/** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
?>
<x-app-layout meta-title="LUMINAIRE" meta-description="This is my first website that i build on my own">

  <div class="container mx-auto max-w-full py-6">

    <div class="mb-8 grid grid-cols-1 gap-8 md:grid-cols-3">

      {{-- Lates Post --}}
      <div class="col-span-2">
        <h2 class="mb-3 border-b-2 border-blue-500 pb-1 text-lg font-bold uppercase text-blue-500 sm:text-xl">
          Lates Post
        </h2>

        <x-post-item :post="$latestPost" />
      </div>

      {{-- Popular 3 Post --}}
      <div>
        <h2 class="mb-3 border-b-2 border-blue-500 pb-1 text-lg font-bold uppercase text-blue-500 sm:text-xl">
          Popular Post
        </h2>

        @foreach ($popularPosts as $post)
          <div class="mb-3 grid grid-cols-4 gap-2">
            <a href="{{ route('view', $post) }}" class="pt-1">
              <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}">
            </a>
            <div class="col-span-3">
              <a href="{{ route('view', $post) }}">
                <h3 class="truncate whitespace-nowrap font-semibold">{{ $post->title }}</h3>
              </a>
              <div class="mb-2 flex gap-4">
                @foreach ($post->categories as $category)
                  <a href="#"
                    class="inline-block rounded-full bg-blue-200 py-1 px-2 text-xs font-semibold uppercase text-blue-600 last:mr-0">
                    {{ $category->title }}
                  </a>
                @endforeach
              </div>
              <div class="text-xs">
                {{ $post->shortBody(10) }}
              </div>
              <a href="{{ route('view', $post) }}" class="text-xs uppercase text-gray-500 hover:text-black">Continue
                Reading <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        @endforeach

      </div>

    </div>

    {{-- Recommended post --}}
    <div class="mb-8">
      <h2 class="mb-3 border-b-2 border-blue-500 pb-1 text-lg font-bold uppercase text-blue-500 sm:text-xl">
        Recommended Post
      </h2>

      <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
        @foreach ($recommendedPosts as $post)
          <x-post-item :post="$post" :show-author="false" />
        @endforeach
      </div>
    </div>

    {{-- Lates categories --}}
    @foreach ($categories as $category)
      <div>
        <h2 class="mb-3 border-b-2 border-blue-500 pb-1 text-lg font-bold uppercase text-blue-500 sm:text-xl">
          Tag "{{ $category->title }}"
          <a href="{{ route('by-category', $category) }}">
            <i class="fas fa-arrow-right"></i>
          </a>
        </h2>

        <div class="mb-6">
          <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
            @foreach ($category->publishedPosts()->limit(3)->get() as $post)
              <x-post-item :post="$post" :show-author="false" />
            @endforeach
          </div>
        </div>
      </div>
    @endforeach

  </div>

</x-app-layout>
