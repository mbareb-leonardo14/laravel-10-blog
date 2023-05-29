<x-app-layout meta-title="About Us" meta-description="Lilin kecil">
  <div class="container mx-auto flex flex-wrap py-6">

    <!-- Post Section -->
    <section class="flex w-full flex-col items-center px-3 md:w-full">

      <article class="my-4 flex flex-col shadow">
        @if ($widget && $widget->image)
          <img src="/storage/{{ $widget->image }}">
        @elseif($widget = '')
          {
          <img src="https://source.unsplash.com/800x300?art">
          }
        @endif

        <div class="flex flex-col justify-start bg-white p-6">
          <h1 class="pb-4 text-3xl font-bold hover:text-gray-700">
            {{ $widget ? $widget->title : '' }}
          </h1>
          <div>
            {!! $widget ? $widget->content : '' !!}
          </div>
        </div>
      </article>
    </section>
    {{-- <img src="https://source.unsplash.com/800x300?art"> --}}

  </div>

</x-app-layout>
