<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ΠΙΝΑΚΑΣ ΕΛΕΓΧΟΥ') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    Για να ξεκινήσετε ένα νέο test παρακαλούμε επιλέξτε το επιθυμητό επίπεδο δυσκολίας και πατήστε το κουμπί "ΕΝΑΡΞΗ TEST"

                    <form method="POST" action="{{ route('newTest') }}">
                    @csrf

                        <div class="py-2">
                            <x-label class="py-2" for="theLevel">Επίπεδο δυσκολίας</x-label>

                            <x-select name="theLevel">
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>
                                <option value="hard">Hard</option>
                            </x-select>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('ΈΝΑΡΞΗ TEST') }}
                            </x-button>

                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
