<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ΑΡΧΙΚΗ') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-blue-800 leading-tight pb-6">Έναρξη νέου τέστ</h2>
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


    <div class="bg-gray-50 overflow-hidden">
        <div class="relative max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <svg class="absolute top-0 left-full transform -translate-x-1/2 -translate-y-3/4 lg:left-auto lg:right-full lg:translate-x-2/3 lg:translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
                <defs>
                    <pattern id="8b1b5f72-e944-4457-af67-0c6d15a99f38" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#8b1b5f72-e944-4457-af67-0c6d15a99f38)" />
            </svg>

            <div class="relative lg:grid lg:grid-cols-3 lg:gap-x-8">
                <div class="lg:col-span-1">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Πίνακας Ελέγχου.</h2>
                </div>
                <dl class="mt-10 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-8 sm:gap-y-10 lg:mt-0 lg:col-span-2">
                    <div>
                        <dt>
                            <h2 class="mt-5 text-lg leading-6 font-medium text-gray-900">Τα τεστ μου</h2>
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">Δείτε όλα τα τέστ που έχετε διενεργήσει καθώς και τα σχετικά αποτελέσματα.</dd>
                        <dd class="mt-2 text-base text-gray-500"><a href="{{ route('tests.index') }}" type="button" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Μετάβαση</a></dd>

                    </div>

                    <div>
                        <dt>
                            <h2 class="mt-5 text-lg leading-6 font-medium text-gray-900">Οι ερωτήσεις μου</h2>
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">Δείτε τις ερωτήσεις που έχετε προσθέσει στο αποθετήριο καθώς και την κατάσταση τους</dd>
                        <dd class="mt-2 text-base text-gray-500"><a href="{{ route('questions.index') }}" type="button" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Μετάβαση</a></dd>
                    </div>

                    <div>
                        <dt>
                            <h2 class="mt-5 text-lg leading-6 font-medium text-gray-900">Νέα ερώτηση</h2>
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">Πατήστε στο παρακώτω κουμπί για να δημιουργήσετε μια νέα ερώτηση.</dd>
                        <dd class="mt-2 text-base text-gray-500"><a href="{{ route('questions.create') }}" type="button" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Δημιουργία Ερώτησης</a></dd>
                    </div>


                </dl>
            </div>
        </div>
    </div>




</x-app-layout>

