@section("body_js", "onload=ShowElements()")
@if(Auth::user()->role == 'administrator')
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Επεξεργασία Χρήστη') }}
        </h2>
    </x-slot>

    <div id="test" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('users.update',$user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="py-2">
                            <x-label class="py-2 text-green-600" for="name">Όνομα</x-label>
                            <x-input name="name" id="name" type="text" value="{{ $user->name }}"/>
                        </div>

                        <div class="py-2">
                            <x-label class="py-2 text-green-600" for="lastname">Επώνυμο</x-label>
                            <x-input name="lastname" id="lastname" type="text" value="{{ $user->lastname }}"/>
                        </div>

                        <div class="py-2">
                            <x-label class="py-2 text-green-600" for="nickname">Ψευδώνυμο</x-label>
                            <x-input name="nickname" id="nickname" type="text" value="{{ $user->nickname }}"/>
                        </div>

                        <div class="py-2">
                            <x-label for="dob" :value="__('Ημερομηνία Γέννησης')" />
                            <x-input id="dob" class="block mt-1 w-full"
                                     type="date"
                                     min="1930-01-01"
                                     max="2020-12-31"
                                     value="{{ $user->dob }}"
                                     name="dob" required />
                        </div>

                        <div class="py-2">
                            <x-label class="py-2" for="type">Ρόλος</x-label>

                            <x-select id="role" name="role">
                                <option value="registered" @if ($user->role == 'registered') selected @endif>Εγγεγραμμένος Χρήστης</option>
                                <option value="moderator" @if ($user->role == 'moderator') selected @endif>Συντονιστής</option>
                                <option value="administrator" @if ($user->role == 'administrator') selected @endif>Διαχειριστής</option>
                            </x-select>

                        </div>

                        <div class="py-2">
                            <x-label class="py-2 text-green-600" for="email">e-mail</x-label>
                            <x-input name="email" id="email" type="email" value="{{ $user->email }}"/>
                        </div>



                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('ΕΝΗΜΕΡΩΣΗ ΧΡΗΣΤΗ') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@else
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Επεξεργασία Χρήστη') }}
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

