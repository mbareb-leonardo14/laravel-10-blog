<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $metaTitle ?: 'LUMINAIRE' }}</title>
  <meta name="author" content="LUMINAIRE">
  <meta name="description" content="{{ $metaDescription }}">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  @livewireStyles

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-family-montserrat bg-white">

  @include('partials.nav')
  @include('partials.header')


  <!-- Page Heading -->
  @if (isset($header))
    <header class="bg-white shadow dark:bg-gray-800">
      <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
  @endif

  <div class="container mx-auto py-6">
    {{ $slot }}
  </div>

  @include('partials.footer')


  @livewireScripts

</body>

</html>
