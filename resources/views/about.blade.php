<x-app-layout meta-title="About Us" meta-description="Lilin kecil">
  <!-- Post Section -->
  <section class="flex w-full flex-col items-center px-3">

    <article class="my-4 flex w-full flex-col shadow">
      <!-- Article Image -->
      <a href="#" class="m-auto hover:opacity-75">
        <img src="/storage/{{ $widget->image }}" class="w-full">
      </a>
      <div class="flex flex-col justify-start bg-white p-6">
        <h1 class="pb-4 text-3xl font-bold hover:text-gray-700">
          {{ $widget->title }}
        </h1>

        <div>
          {!! $widget->content !!}
        </div>

      </div>
    </article>

  </section>

</x-app-layout>
