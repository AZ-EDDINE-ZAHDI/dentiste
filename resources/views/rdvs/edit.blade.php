<!DOCTYPE html>
<html lang="fr" :class="{ 'theme-dark': dark }" x-data="data()">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="assets/img/logo.png" />
    <title>Modifier le rendez-vous</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}"/>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer ></script>
</head>
<body>        
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Backdrop -->
    <div class="flex flex-col flex-1 w-full">
      <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div class="container flex items-center justify-between h-full px-6 mx-auto text-teal-600 dark:text-teal-300">
            <!-- Mobile hamburger -->
            <a class="logo ml-6 text-3xl font-bold text-teal-600 dark:text-gray-200" href="/rdvs">Dentiste</a>
            <!-- Search input -->

            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Theme toggler -->
                <li class="flex">
                <button class="rounded-md focus:outline-none focus:shadow-outline-blue" @click="toggleTheme" aria-label="Toggle color mode">
                    <template x-if="!dark">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    </template>
                    <template x-if="dark">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                    </svg>
                    </template>
                </button>
                </li>
                <!-- Profile -->
                <li class="relative mb-1">
                    <a href="{{ route('profile.show') }}" class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-blue" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>                
                    </a>
                </li>
                <!-- Log out -->
                <li class="relative mb-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-blue" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                            </svg>                    
                        </a>
                    </form>
                </li>          
            </ul>
        </div>
      </header>
      <main class="h-full overflow-y-auto">
        <div class="container px-4 mx-auto grid">
            <!-- CTA -->
            <div class="mt-6 flex items-center justify-between py-2 mb-8 text-sm font-semibold">
                <p class="text-gray-700 p-2 text-xl">
                    Modifier le rendez-vous
                </p>
                <a href="/rdvs" class="text-teal-100 bg-teal-600 p-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>                
                </a>
            </div>
          <!-- Cards -->

          <div class="w-full mb-4 overflow-hidden rounded-lg shadow-xs bg-white p-4 dark:bg-gray-700">
            <div class="w-full overflow-x-auto">
    
                <form method="POST" action="{{ url('modifierrdvs/'.$data->id) }}">
                @csrf
                <div class=" justify-center w-full"><br>
        
                    <label class="block text-sm font-semibold">
                        <span class="text-gray-700 dark:text-gray-400">Nom et prénom</span>
                        <input required name="nom" value="{{ $data->nom }}" type="text" placeholder="Nom et prénom" class="block w-full mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>
                    <label class="block text-sm font-semibold">
                        <span class="text-gray-700 dark:text-gray-400">Télephone</span>
                        <input required name="numero" value="{{ $data->numero }}" type="text" placeholder="Télephone" class="block w-full mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>
                    <label class="block text-sm font-semibold">
                        <span class="text-gray-700 dark:text-gray-400">Service</span>
                        <select  name="service" class="block w-full mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray p-2 rounded border">
                            <option selected value="{{ $data->service }}">{{ $data->service }}</option>
                            @foreach ($service as $service)
                                <option value="{{ $service->nom }}">{{ $service->nom }}</option>                       
                            @endforeach
                        </select>
                    </label>
                    <label class="block text-sm font-semibold">
                        <span class="text-gray-700 dark:text-gray-400">Prix</span>
                        <input required name="prix" value="{{ $data->prix }}" type="text" placeholder="Prix" class="block w-full mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>

                </div>
                <button type="submit" class="px-4 py-2 mt-4 flex justify-end text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-purple">
                    Modifier
                </button>            
            </form>
            </div>
        </div>

        </div>
      </main>
    </div>
  </div>
</body>
</html>