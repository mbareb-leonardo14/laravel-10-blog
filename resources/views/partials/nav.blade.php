<nav class="sticky top-0 w-full bg-black py-4 shadow">
  <div class="container mx-auto flex w-full flex-wrap items-center justify-between">

    <nav>
      <ul class="flex items-center justify-between text-sm font-bold uppercase text-white no-underline">
        <li><a class="px-4 hover:text-gray-200 hover:underline" href="#">Shop</a></li>
        <li><a class="px-4 hover:text-gray-200 hover:underline" href="{{ route('about-us') }}">About</a></li>
      </ul>
    </nav>

    <div class="flex items-center pr-6 text-lg text-white no-underline">

      <div class="px-5" x-data="{ mode: 'light' }" x-on:dark-mode-toggled.window="mode = $event.detail">
        <span x-show="mode === 'light'">
          <i class="fa-solid fa-moon"></i>
        </span>

        <span x-show="mode === 'dark'">
          <i class="fa-solid fa-sun"></i>
        </span>
      </div>

      @auth()
        <div class="flex sm:ml-6 sm:items-center">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button class="mx-2 flex items-center py-2 px-4 hover:bg-black hover:text-white">
                <div>{{ Auth::user()->name }}</div>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                                            this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        </div>
      @else
        <a href="{{ route('login') }}" class="mx-2 py-2 px-4 hover:bg-black hover:text-white">Login <i
            class="fa-sharp fa-solid fa-right-to-bracket"></i></a>
      @endauth
    </div>
  </div>

</nav>
