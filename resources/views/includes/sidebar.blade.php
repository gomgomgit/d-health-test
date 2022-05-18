
<!-- Desktop sidebar -->
<aside
  class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0"
>
  <div class="py-4 text-gray-500">
    <a
      class="ml-6 text-lg font-bold text-gray-800"
      href="#"
    >
      E-Prescription
    </a>
    <ul class="mt-6">
      {{-- <li class="relative px-6 py-3">
        @if(Route::is('dashboard.*') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('dashboard.index')}}"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            ></path>
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li> --}}
      <li class="relative px-6 py-3">
        @if(Route::is('recipes.create') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('recipes.create')}}"
        >
          <i class="fa-solid fa-notes-medical"></i>
          <span class="ml-4">Tambah Resep</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::is('recipes.index') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('recipes.index')}}"
        >
          <i class="fa-solid fa-list-check"></i>
          <span class="ml-4">History Resep</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::is('drugs.*') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('drugs.index')}}"
        >
          <i class="fa-solid fa-capsules"></i>
          <span class="ml-4">Obat</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::is('signas.*') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('signas.index')}}"
        >
          <i class="fa-solid fa-file-contract"></i>
          <span class="ml-4">Signa</span>
        </a>
      </li>
    </ul>
    <div class="px-6 my-6">
      <a href="{{Route('logout')}}">
        <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Logout
          <i class="ml-2 fa-solid fa-right-from-bracket"></i>
        </button>
      </a>
    </div>
  </div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div
  x-show="isSideMenuOpen"
  x-transition:enter="transition ease-in-out duration-150"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in-out duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
></div>
<aside
  class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden"
  x-show="isSideMenuOpen"
  x-transition:enter="transition ease-in-out duration-150"
  x-transition:enter-start="opacity-0 transform -translate-x-20"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in-out duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0 transform -translate-x-20"
  @click.away="closeSideMenu"
  @keydown.escape="closeSideMenu"
>
  <div class="py-4 text-gray-500">
    <a
      class="ml-6 text-lg font-bold text-gray-800"
      href="#"
    >
      E-Prescription
    </a>
    <ul class="mt-6">
      <li class="relative px-6 py-3">
        @if(Route::is('recipes.create') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('recipes.create')}}"
        >
          <i class="fa-solid fa-notes-medical"></i>
          <span class="ml-4">Tambah Resep</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::is('recipes.index') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('recipes.index')}}"
        >
          <i class="fa-solid fa-list-check"></i>
          <span class="ml-4">History Resep</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::is('drugs.*') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('drugs.index')}}"
        >
          <i class="fa-solid fa-capsules"></i>
          <span class="ml-4">Obat</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::is('signas.*') )
            <span
              class="absolute inset-y-0 left-0 w-1 bg-cyan-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
            ></span>
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
          href="{{Route('signas.index')}}"
        >
          <i class="fa-solid fa-file-contract"></i>
          <span class="ml-4">Signa</span>
        </a>
      </li>
    </ul>
    <div class="px-6 my-6">
      <a href="{{Route('logout')}}">
        <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Logout
          <i class="ml-2 fa-solid fa-right-from-bracket"></i>
        </button>
      </a>
    </div>
    {{-- <div class="px-6 my-6">
      <button
        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-cyan-600 border border-transparent rounded-lg active:bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:shadow-outline-cyan"
      >
        Create account
        <span class="ml-2" aria-hidden="true">+</span>
      </button>
    </div> --}}
  </div>
</aside>