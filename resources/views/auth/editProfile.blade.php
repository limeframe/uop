@section("body_js", "onload=ShowElements()")
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Επεξεργασία Προφίλ') }}
        </h2>
    </x-slot>

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

    <div id="test" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <img src="{{$user->picture}}">

                    <form method="POST" action="{{ route('auth.updateProfile',$user->id) }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="role" value="{{$user->role}}">

                        <div class="py-2">
                            <x-label class="py-2" for="name">Όνομα</x-label>
                            <x-input name="name" id="name" type="text" value="{{ $user->name }}"/>
                        </div>

                        <div class="py-2">
                            <x-label class="py-2" for="lastname">Επώνυμο</x-label>
                            <x-input name="lastname" id="lastname" type="text" value="{{ $user->lastname }}"/>
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
                            <x-label class="py-2" for="email">e-mail</x-label>
                            <x-input name="email" id="email" type="email" value="{{ $user->email }}"/>
                            <p id="message"></p>
                        </div>

                        <!-- Password -->
                        <div class="py-2">
                            <x-label for="password" :value="__('Συνθηματικό')" />

                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     autocomplete="new-password" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('ΕΝΗΜΕΡΩΣΗ ΠΡΟΦΙΛ') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
