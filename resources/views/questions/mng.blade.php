@if(Auth::user()->role == 'administrator' || Auth::user()->role == 'moderator')
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
            {{ __('Διαχείριση ερωτήσεων') }}
        </h2>
    </x-slot>


    <div class="py-4 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-green-500">Εγκεκριμένες</h1>
                        <p class="mt-2 text-sm text-gray-700">Ερωτήσεις που έχετε εγκρίνει</p>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Τίτλος</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Είδος</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Επίπεδο</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ημερομηνία καταχώρησης</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ημερομηνία έγκρισης</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Επεξεργασία</span>
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Διαγραφή</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">

                                    @foreach($approvedQuestions as $aquestion)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $aquestion->title }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @switch($aquestion->type)
                                                    @case('complete')
                                                    Συμπλήρωσης
                                                    @break

                                                    @case('truefalse')
                                                    Σωστό/Λάθος
                                                    @break

                                                    @default
                                                    Πολλαπλής Επιλογής
                                                @endswitch
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @switch($aquestion->level)
                                                    @case('easy')
                                                    Easy
                                                    @break

                                                    @case('medium')
                                                    Medium
                                                    @break

                                                    @default
                                                    Hard
                                                @endswitch
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $aquestion->created_at }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $aquestion->approvalDate }}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{ route('questions.edit',$aquestion->id) }}" class="text-indigo-600 hover:text-indigo-900">Επεξεργασία</a>
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <form method="POST" action="{{ route('questions.destroy',$aquestion->id) }}">
                                                @method('delete')
                                                @csrf
                                                <x-button class="normal-case ml-4 bg-red-600 text-white" onclick="return confirm('Είστε σίγουροι ότι θέλετε να διαγράψετε την ερώτηση; \nΜετά την διαγραφή δεν θα μπορείτε να την επαναφέρετε.')">
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

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-red-500">Σε αναμονή έγκρισης</h1>
                        <p class="mt-2 text-sm text-gray-700">Ερωτήσεις που βρίσκονται σε κατάσταση αναμονής έγκρισης</p>
                    </div>

                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Τίτλος</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Είδος</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Επίπεδο</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ημερομηνία καταχώρησης</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ημερομηνία έγκρισης</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Επεξεργασία</span>
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Διαγραφή</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">

                                    @foreach($pendingQuestions as $pquestion)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $pquestion->title }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @switch($pquestion->type)
                                                    @case('complete')
                                                    Συμπλήρωσης
                                                    @break

                                                    @case('truefalse')
                                                    Σωστό/Λάθος
                                                    @break

                                                    @default
                                                    Πολλαπλής Επιλογής
                                                @endswitch
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @switch($pquestion->level)
                                                    @case('easy')
                                                    Easy
                                                    @break

                                                    @case('medium')
                                                    Medium
                                                    @break

                                                    @default
                                                    Hard
                                                @endswitch
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">@if ($pquestion->created_at != null) {{ date("d-m-Y", strtotime($pquestion->created_at)) }} @endif</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">@if ($pquestion->approvalDate != null) {{ date("d-m-Y", strtotime($pquestion->approvalDate)) }} @endif</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{ route('questions.edit',$pquestion->id) }}" class="text-indigo-600 hover:text-indigo-900">Επεξεργασία</a>
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <form method="POST" action="{{ route('questions.destroy',$pquestion->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <x-button class="normal-case ml-4 bg-red-600 text-white" onclick="return confirm('Είστε σίγουροι ότι θέλετε να διαγράψετε την ερώτηση; \nΜετά την διαγραφή δεν θα μπορείτε να την επαναφέρετε.')">
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
                {{ __('Διαχείριση Ερωτήσεων') }}
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

