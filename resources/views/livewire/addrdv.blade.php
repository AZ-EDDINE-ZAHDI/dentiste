<div>
    <!-- Form Add rdv -->
    <div id="addrdv" class="w-full mb-4 overflow-hidden rounded-lg shadow-xs bg-white p-4 dark:bg-gray-700">
    <div class="w-full overflow-x-auto">

        <div class="justify-center w-full"><br>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-5">
                <div>
                    <label class="block text-sm font-semibold">
                        <span class="text-gray-700 dark:text-gray-400">Nom et prénom</span>
                        <input required wire:model="nom" type="text" placeholder="Nom et prénom" class="block w-full mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>        
                </div>
                <div>
                    <label class="block text-sm font-semibold">
                        <span class="text-gray-700 dark:text-gray-400">Télephone</span>
                        <input required wire:model="numero" type="text" placeholder="Télephone" class="block w-full mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>        
                </div>
                <div>
                    <label class="block text-sm font-semibold">
                        <span class="text-gray-700 dark:text-gray-400">Service</span>
                        <input required wire:model="service" type="text" placeholder="Service" class="block w-full mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>        
                </div>
                <div>
                    <label class="block text-sm font-semibold">
                        <span class="text-gray-700 dark:text-gray-400">Prix</span>
                        <input required wire:model.prevent="prix" type="number" placeholder="Prix" class="block w-full mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>        
                </div>
                <div>
                    <button wire:click="AddRdv()" class="px-4 py-2 w-full flex justify-center mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-purple">
                        Ajouter
                    </button>                        
                </div>
            </div>    
        </div>

    </div>
    </div>
    <!-- End from rdv -->
</div>
