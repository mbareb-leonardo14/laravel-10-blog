<!-- Sidebar Section -->
<aside class="flex w-full flex-col items-center px-3 md:w-1/3">

  <div class="my-4 flex w-full flex-col bg-white p-6 shadow">
    <h3 class="mb-3 text-xl font-semibold">All Tags</h3>
    @foreach ($categories as $category)
      <a href="{{ route('by-category', $category) }}"
        class="text-semibold {{ request('category')?->slug === $category->slug ? 'bg-blue-600 text-white' : '' }} block rounded py-2 px-3">
        {{ $category->title }} ({{ $category->total }})
      </a>
    @endforeach
  </div>

  <div class="my-4 flex w-full flex-col bg-white p-6 shadow">
    <p class="pb-5 text-xl font-semibold">{{ \App\Models\TextWidget::getTitle('about-us-sidebar') }}</p>
    {!! \App\Models\TextWidget::getContent('about-us-sidebar') !!}
    <a href="{{ route('about-us') }}"
      class="mt-4 flex w-full items-center justify-center rounded bg-blue-800 px-2 py-3 text-sm font-bold uppercase text-white hover:bg-blue-700">
      Get to know us
    </a>
  </div>

</aside>
