<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
            .font-family-karla { font-family: karla;}
        </style>
    </head>
<body class="bg-white font-family-karla h-screen">

    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full">

            <div class="min-h-full flex items-center justify-center py-8 px-8 sm:px-6 lg:px-8" style="padding: 30px 100px 0px 100px">
                <div class="max-w-md w-full space-y-8">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                        </svg>                        
                        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Bienvenue.</h2>
                    </div>
                    <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div>
                                <label for="name" class="sr-only">Nom d'utilisateur</label>
                                <input name="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none sm:text-sm" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="mt-3">
                                <label for="email-address" class="sr-only">Email</label>
                                <input name="email" type="email"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:z-10 sm:text-sm" placeholder="Email">
                            </div>
                            <div class="mt-3">
                                <label for="password" class="sr-only">Mot de pass</label>
                                <input name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none sm:text-sm" placeholder="Mot de pass">
                            </div>
                            <div class="mt-3">
                                <label for="password_confirmation" class="sr-only">Confirmer le mot de pass</label>
                                <input name="password_confirmation" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none sm:text-sm" placeholder="Confirmer le mot de pass">
                            </div>
                        </div>
                
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 outline-none text-indigo-600 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Souviens de moi </label>
                            </div>
                    
                            <div class="text-sm">
                                <a href="{{ route('login') }}" class="font-medium text-black"> Connexion? </a>
                            </div>
                        </div>
                
                        <div>
                            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent font-medium text-white bg-black focus:outline-none">
                                Inscription
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>
</html>

