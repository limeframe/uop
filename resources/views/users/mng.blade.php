@if(Auth::user()->role == 'administrator')

    <x-app-layout>

    @if(Session::has('success'))
        <div class="py-4 mt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">

                            <div class="alert alert-success">
                                <div class="rounded-md bg-green-50 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: solid/check-circle -->
                                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-green-800">Μήνυμα Επιτυχίας</h3>
                                            <div class="mt-2 text-sm text-green-700">
                                                <p>{{Session::get('success')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Διαχείριση Χρηστών') }}
        </h2>
    </x-slot>


    <div class="py-4 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-green-500">Διαχείριση Χρηστών</h1>
                        <p class="mt-2 text-sm text-gray-700">Παρακάτω μπορείτε να διαχειριστείτε του χρήστες του συστήματος</p>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Ονοματεπώνυμο</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ρόλος</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ημ/νια Εγγραφής</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Επεξεργασία</span>
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Διαγραφή</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">

                                    @foreach($registeredUsers as $regusr)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $regusr->name }} {{ $regusr->lastname }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @switch($regusr->role)
                                                    @case('administrator')
                                                    Διαχειριστής
                                                    @break

                                                    @case('moderator')
                                                    Συντονιστής
                                                    @break

                                                    @default
                                                    Εγγεγραμμένος Χρήστης
                                                @endswitch
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $regusr->created_at }}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{ route('users.edit',$regusr->id) }}" class="text-indigo-600 hover:text-indigo-900">Επεξεργασία</a>
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <form method="POST" action="{{ route('users.destroy',$regusr->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <x-button class="normal-case ml-4 bg-red-600 text-white" onclick="return confirm('Είστε σίγουροι ότι θέλετε να διαγράψετε τον χρήστη; \nΜετά την διαγραφή δεν θα μπορείτε να τον επαναφέρετε.')">
                                                        {{ __('Διαγραφή') }}
                                                    </x-button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

@else
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Διαχείριση Χρηστών') }}
            </h2>
        </x-slot>
        <div class="py-4 mt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                        <div class="rounded-md bg-red-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/x-circle -->
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Λυπούμαστε</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <p> Δεν έχετε πρόσβαση στην συγκεκριμένη σελίδα!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
    </x-app-layout>

@endif
