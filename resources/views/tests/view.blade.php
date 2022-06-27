<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('submitTest') }}">
                        @csrf
                        @method('POST')

                        <?php $afxon = 1; ?>
                        @foreach($getRandomQuestions as $que)


                            <div class="grid grid-cols-1 divide-x divide-blue-500">
                                @if($que->type == "complete")
                                    <div>

                                        <x-label class="py-2 mt-4 font-bold text-blue-600" for="type">

                                            <span class="text-red-400">ΕΡΩΤΗΣΗ {{ $afxon }}: </span>

                                            {{ $que->title }}</x-label>

                                        <x-input name="apantisi-{{ $que->id }}" id="title" type="text"/>
                                    </div>

                                @elseif($que->type == "truefalse")
                                    <div>

                                        <x-label class="py-2 mt-4 font-bold text-blue-600" for="type">

                                            <span class="text-red-400">ΕΡΩΤΗΣΗ {{ $afxon }}: </span>

                                            {{ $que->title }}</x-label>

                                        <x-radio name="apantisi-{{$que->id}}" value="ok" label="Σωστό"/>
                                        <x-radio name="apantisi-{{$que->id}}" value="notok" label="Λάθος"/>
                                    </div>

                                @elseif($que->type == "multiplechoice")
                                    <div>

                                        <x-label class="py-2 mt-4 font-bold text-blue-600" for="type">

                                            <span class="text-red-400">ΕΡΩΤΗΣΗ {{ $afxon }}: </span>

                                            {{ $que->title }}</x-label>

                                        @foreach(explode(',', $que->posanswers) as $pan)
                                            <div class="flex items-center mb-4">
                                                <input type="checkbox" name="apantisi-{{$que->id}}[]" value="{{$pan}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$pan}}</label>
                                            </div>
                                        @endforeach


                                    </div>

                                @elseif($que->type == "singlechoice")
                                    <div>
                                        <label for="" class="block mb-2 py-2 mt-4 font-bold text-blue-600"><span class="text-red-400">ΕΡΩΤΗΣΗ {{ $afxon }}: </span> {{ $que->title }}</label>
                                        <select name="apantisi-{{$que->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Επιλέξτε την σωστή απάντηση</option>
                                            <!-- get posanswers -->

                                            @foreach(explode(',', $que->posanswers) as $pan)
                                                <option value="{{$pan}}">{{$pan}}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                @endif

                            </div>
                            <?php $afxon = $afxon + 1; ?>
                        @endforeach



                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4" onclick="return confirm('Είστε σίγουροι ότι θέλετε να ολοκληρώσετε το τεστ; \nΜετά την ολοκλήρωση δεν θα μπορείτε να αλλάξετε τις απαντήσεις σας.')">
                                {{ __('ΟΛΟΚΛΗΡΩΣΗ ΤΕΣΤ') }}
                            </x-button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

</script>
