<?php
/** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
?>
<x-app-layout :meta-title="'Posts by tag - ' . $category->title" meta-description="By tag">

  <!-- Posts Section -->
  <section class="flex w-full flex-col items-center px-3 md:w-2/3">

    @foreach ($posts as $post)
      <x-post-item :post="$post"></x-post-item>
    @endforeach

    {{ $posts->onEachSide(1)->links() }}
  </section>

  <x-sidebar />

</x-app-layout>
