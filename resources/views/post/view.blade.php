<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">

  <!-- Post Section -->
  <section class="flex w-full flex-col px-3 md:w-2/3">

    <article class="my-4 flex flex-col shadow">
      <!-- Article Image -->
      <a href="#" class="m-auto hover:opacity-75">
        {{-- @forelse ($post->categories as $category)
          <img src="{{ $category->getThumbnail() }}" class="" alt="{{ $category->slug }}">
        @empty
          <img src="https://source.unsplash.com/800x300?{{ $category->slug }}" alt="{{ $category->slug }}">
        @endforelse --}}
        @empty($post->thumbnail)
          <img src="https://source.unsplash.com/800x300?{{ $post->category }}">
        @else
          <img src="{{ $post->getThumbnail() }}" class="">
        @endempty
      </a>
      <div class="flex flex-col justify-start bg-white p-6">
        <div class="flex gap-4">
          @foreach ($post->categories as $category)
            <a href="#"
              class="mb-3 inline-block bg-black py-1 px-2 text-xs font-semibold uppercase text-white">{{ $category->title }}</a>
          @endforeach
        </div>
        <h1 class="pb-4 text-3xl font-bold hover:text-gray-700">
          {{ $post->title }}
        </h1>
        <p href="#" class="pb-8 text-sm">
          By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on
          {{ $post->getFormattedDate() }} | {{ $post->human_read_time }}
        </p>

        <div>
          {!! $post->body !!}
        </div>

        <livewire:upvote-downvote :post="$post" />
      </div>
    </article>

    <div class="flex w-full pt-6">
      <div class="w-1/2">
        @if ($prev)
          <a href="{{ route('view', $prev) }}" class="block w-full bg-white p-6 text-left shadow hover:shadow-md">
            <p class="flex items-center text-lg font-bold text-black">
              <i class="fas fa-arrow-left pr-1"></i>
              Previous
            </p>
            <p class="pt-2">
              {{ \Illuminate\Support\Str::words($prev->title, 8) }}
            </p>
          </a>
        @endif
      </div>
      <div class="w-1/2">
        @if ($next)
          <a href="{{ route('view', $next) }}" class="block w-full bg-white p-6 text-right shadow hover:shadow-md">
            <p class="flex items-center justify-end text-lg font-bold text-black">Next <i
                class="fas fa-arrow-right pl-1"></i></p>
            <p class="pt-2">
              {{ \Illuminate\Support\Str::words($next->title, 8) }}
            </p>
          </a>
        @endif
      </div>
    </div>

    <div class="mt-10 mb-10 flex w-full flex-col bg-white p-6 text-center shadow md:flex-row md:text-left">
      <div class="flex w-full justify-center pb-4 md:w-1/5 md:justify-start">
        <img src="https://source.unsplash.com/collection/1346951/150x150?sig=1" class="h-32 w-32 rounded-full shadow">
      </div>
      <div class="flex flex-1 flex-col justify-center md:justify-start">
        <p class="text-2xl font-semibold">David</p>
        <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero
          suscipit suscipit eu eu urna.</p>
        <div class="flex items-center justify-center pt-4 text-2xl text-black no-underline md:justify-start">
          <a class="" href="#">
            <i class="fab fa-facebook"></i>
          </a>
          <a class="pl-4" href="#">
            <i class="fab fa-instagram"></i>
          </a>
          <a class="pl-4" href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a class="pl-4" href="#">
            <i class="fab fa-linkedin"></i>
          </a>
        </div>
      </div>
    </div>

    <livewire:comments :post="$post" />
  </section>

  <x-sidebar />

</x-app-layout>
