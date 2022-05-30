<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Τα τεστ μου') }}
        </h2>
    </x-slot>




    <div class="py-4 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">

                        @if(session()->has('message'))
                            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif


                        <h1 class="text-xl font-semibold text-green-500">Αποτελέσματα</h1>
                        <p class="mt-2 text-sm text-gray-700">Δείτε παρακάτω τα tests που έχετε πραγματοποιήσει καθώς και τα αποτελέσματα τους</p>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ΚΩΔ.ΤΕΣΤ</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ΗΜΕΡΟΜΗΝΙΑ</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ΠΟΣΟΣΤΟ ΕΠΙΤΥΧΙΑΣ</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ΑΠΟΤΕΛΕΣΜΑ</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">ΠΕΡΙΣΣΟΤΕΡΑ</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">

                                    @foreach($myTests as $mytst)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">#{{ $mytst->id }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ date("d-m-Y", strtotime( $mytst->created_at )) }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $mytst->pososto }}%</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">@if($mytst->apotelesma == 'SUCCESS') <span class="text-green-600"> @else <span class="text-red-600">@endif{{ $mytst->apotelesma }}</span></td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{ route('tests.show',$mytst->id) }}" class="text-indigo-600 hover:text-indigo-900">ΠΕΡΙΣΣΟΤΕΡΑ</a>
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
