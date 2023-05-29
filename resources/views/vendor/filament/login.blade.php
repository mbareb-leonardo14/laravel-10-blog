<form wire:submit.prevent="authenticate" class="space-y-8">
  {{ $this->form }}

  <x-filament::button type="submit" form="authenticate" class="w-full">
    {{ __('filament::login.buttons.submit.label') }}
  </x-filament::button>
  <div class="flex items-center space-x-4">
    <div class="h-1 w-full border-t-2 border-slate-600"></div>
    <h1>Or</h1>
    <div class="h-1 w-full border-t-2 border-slate-600"></div>
  </div>
  <div class="flex items-center justify-evenly space-x-4">
    {{-- icons from iconify --}}
    <span class="iconify h-5 w-5" data-icon="flat-color-icons:google"></span>
    <span class="iconify h-5 w-5" data-icon="logos:github-icon"></span>
    <span class="iconify h-5 w-5" data-icon="logos:facebook"></span>
  </div>
</form>
