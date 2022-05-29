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

                    <form method="POST" action="{{ route('questions.update',1) }}">
                        @csrf
                        @method('POST')

                        <?php $afxon = 1; ?>
                        @foreach($getRandomQuestions as $que)

                            <div class="grid grid-cols-1 divide-x divide-blue-500">
                                @if($que->type == "complete")
                                    <div id="apantisi-{{$que->id}}">
                                        <x-label class="py-2 mt-4 font-bold text-blue-600" for="type">

                                            <span class="text-red-400">ΕΡΩΤΗΣΗ {{ $afxon }}: </span>

                                            {{ $que->title }}</x-label>

                                        <x-input name="title" id="title" type="text" value=""/>
                                    </div>

                                @elseif($que->type == "truefalse")
                                    <div id="apantisi-{{$que->id}}">
                                        <x-label class="py-2 mt-4 font-bold text-blue-600" for="type">

                                            <span class="text-red-400">ΕΡΩΤΗΣΗ {{ $afxon }}: </span>

                                            {{ $que->title }}</x-label>

                                        <x-radio name="tier" id="tier_1" value="1" label="Σωστό"/>
                                        <x-radio name="tier" id="tier_2" value="0" label="Λάθος"/>
                                    </div>

                                @elseif($que->type == "multiplechoice")
                                    <div id="apantisi-{{$que->id}}">
                                        <x-label class="py-2 mt-4 font-bold text-blue-600" for="type">

                                            <span class="text-red-400">ΕΡΩΤΗΣΗ {{ $afxon }}: </span>

                                            {{ $que->title }}</x-label>
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
