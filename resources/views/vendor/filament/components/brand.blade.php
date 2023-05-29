@if (filled($brand = config('filament.brand')))
  <div @class([
      'filament-brand text-xl font-bold leading-5 tracking-tight pl-6',
      'dark:text-white light:invert-0' => config('filament.dark_mode'),
  ])>
    <img src="{{ asset('/images/logo.svg') }}" alt="Logo" class="h-7 invert" style="filter: invert(1);">
    {{-- <img src="{{ asset('/images/logo.svg') }}" alt="Logo" @class(['h-7 invert-1'])> --}}
  </div>
@endif
