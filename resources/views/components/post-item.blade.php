<article class="my-4 flex flex-col shadow">
  <!-- Article Image -->
  <a href="{{ route('view', $post) }}" class="hover:opacity-75">
    <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}" class="w-full object-cover">
  </a>
  <div class="flex flex-col justify-start bg-white p-6">
    <div class="flex gap-4 pb-3">
      @foreach ($post->categories as $category)
        <a href="{{ $category->title }}"
          class="inline-block bg-black py-1 px-2 text-xs font-semibold uppercase text-white">
          {{ $category->title }}
        </a>
      @endforeach
    </div>

    <a href="{{ route('view', $post) }}" class="pb-4 text-3xl font-bold hover:text-gray-700">
      {{ $post->title }}
    </a>
    <p href="#" class="pb-3 text-sm">
      By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on <i
        class="fas fa-calendar"></i>
      {{ $post->getFormattedDate() }} | <i class="fas fa-clock"></i> {{ $post->human_read_time }}
    </p>
    <a href="{{ route('view', $post) }}" class="pb-6">
      {{ $post->shortBody() }}
    </a>
    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
        class="fas fa-arrow-right"></i></a>
  </div>
</article>
