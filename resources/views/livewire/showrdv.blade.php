<div>
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-3">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">ID</th>
            <th class="px-4 py-3">Client</th>
            <th class="px-4 py-3">Service</th>
            <th class="px-4 py-3">Prix</th>
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Avance</th>
            <th class="px-4 py-3"></th>
            <th class="px-4 py-3">Reste</th>
            <th class="px-4 py-3">Payé</th>
            <th class="px-4 py-3">Option</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($rdv as $rdv)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-xs h-full">
                    {{ $rdv->id }}
                </td>

                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                        <!-- Avatar with inset shadow -->
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                            @php
                            $total = 0;
                            $reste = $rdv->prix;
                            foreach($avances as $avance)
                            {
                            if($avance->num == $rdv->id)
                            {
                                $total += $avance->avc;
                                $reste = ($rdv->prix - $total);
                            }
                            }
                            @endphp
                            @if ($total == $rdv->prix)  
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-teal-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            @endif
                            @if ($total > $rdv->prix)          
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>                       
                            @endif
                            @if ($total < $rdv->prix) 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>                                
                            @endif
                        </div>
                        <div>
                        <p class="font-semibold">{{ $rdv->nom }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">{{ $rdv->numero }}</p>
                        </div>
                    </div>
                </td>

                <td class="px-4 py-3 text-sm">
                    {{ $rdv->service }}
                </td>

                <td class="px-4 py-3 text-sm">
                    {{ $rdv->prix }} DH
                </td>

                <td class="px-4 py-3 text-sm">
                    {{ $rdv->created_at->format('d M Y') }}
                </td>

                <td class="px-4 py-3 text-sm">
                    @foreach ($avances as $avance)
                    @if ($avance->num == $rdv->id)
                    <div class="flex space-x-2 items-center">
                        <p>{{ $avance->avc }}</p>
                        <button wire:click="RemoveAvc({{ $avance->id }})" class="outline-none focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>                              
                        </button>  
                    </div>
                    @endif
                    @endforeach
                </td>

                <td class="px-4 py-3 text-sm">
                    <label class="text-sm font-semibold flex items-center">
                        <input required wire:model.defer="avc" type="number" placeholder="Avance" class="w-32 block mt-1 mb-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-teal-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                        <button wire:click="AddAvc({{ $rdv->id }})" class="text-teal-100 bg-teal-600 p-2 rounded-md ml-2 mb-1 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </label>
                </td>

                <td class="px-4 py-3 text-sm">
                    <?php echo $reste ?> DH 
                </td>

                <td class="px-4 py-3 text-sm">
                    <?php echo $total ?> DH 
                </td>
                
                <td class="px-4 py-3 text-xs h-full">
                    <div class="flex items-center">
                    <a href="{{ url('/rdvs/edit', $rdv->id)}}" class="p-1 bg-teal-600 rounded-md text-teal-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </a>
                    <button wire:click="Remove({{ $rdv->id }})" class="p-1 bg-red-600 rounded-md ml-2 text-teal-100 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
    <!-- End table rdvs -->
</div>
