<!-- Text Header -->
<header class="container mx-auto w-full">
  <div class="flex flex-col items-center py-12">
    <a class="text-5xl font-bold uppercase text-gray-800 hover:text-gray-700" href="{{ route('home') }}">
      {{ \App\Models\TextWidget::getTitle('who-i-am') }} Blog
    </a>
    <p class="text-center text-lg text-gray-600">
      {{ \App\Models\TextWidget::getTitle('header') }}
    </p>
  </div>
</header>

<!-- Topic Nav -->
<nav class="w-full border-t border-b bg-gray-100 py-4" x-data="{ open: false }">
  <div class="block sm:hidden">
    <a href="#" class="block items-center justify-center text-center text-base font-bold uppercase md:hidden"
      @click="open = !open">
      Topics <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
    </a>
  </div>
  <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:w-auto sm:items-center">
    <div
      class="container mx-auto mt-0 flex w-full flex-col items-center justify-between px-6 py-2 text-sm font-bold uppercase sm:flex-row">

      <div>
        <a href="{{ route('home') }}" class="mx-2 py-2 px-4 hover:bg-black hover:text-white">Home</a>
        @foreach ($categories as $category)
          <a href="{{ route('by-category', $category) }}"
            class="mx-2 py-2 px-4 hover:bg-black hover:text-white">{{ $category->title }}</a>
        @endforeach
      </div>

      <div class="flex items-center">
        <form action="{{ route('search') }}" method="GET">
          <input name="q" value="{{ request()->get('q') }}"
            class="-md block h-10 w-full rounded-none border-2 border-gray-300 bg-white px-5 pr-16 text-sm focus:outline-none sm:text-sm sm:leading-6"
            placeholder="Search">
        </form>
      </div>


    </div>
  </div>
</nav>
