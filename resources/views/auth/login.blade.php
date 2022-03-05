<!DOCTYPE html>
<html lang="fr" :class="{ 'theme-dark': dark }" x-data="data()">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer ></script>
    <script src="./assets/js/charts-lines.js" defer></script>
    <script src="./assets/js/charts-pie.js" defer></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../assets/img/dentist.jpg" alt="Office"/>
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Bienvenue.
              </h1>
              <form  method="POST" action="{{ route('login') }}">
                @csrf    
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input name="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Email"/>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Mot de pass</span>
                <input name="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Mot de pass" type="password"/>
              </label>

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-blue" href="../index.html">
                Connexion
              </button>
            </form>
              <div class="flex justify-between mt-4">
                <span class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 outline-none text-teal-600 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 font-medium  block text-sm text-gray-900"> Souviens de moi </label>
                </span>
                <span>
                    <a href="{{route('register')}}" class="text-sm font-medium text-teal-600 dark:text-blue-400 hover:underline">
                    Inscription
                    </a>
                </span>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

