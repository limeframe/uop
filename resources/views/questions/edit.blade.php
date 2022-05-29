@section("body_js", "onload=ShowElements()")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Επεξεργασία Ερώτησης') }}
        </h2>
    </x-slot>

    <div id="test" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('questions.update',$question->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="py-2">
                            <x-label class="py-2" for="type">Τύπος Ερώτησης</x-label>

                            <x-select onchange="ShowExtraDivs(this.value)" id="type" name="type">
                                <option value="truefalse" @if ($question->type == 'truefalse') selected @endif>Σωστό/Λάθος</option>
                                <option value="complete" @if ($question->type == 'complete') selected @endif>Συμπλήρωσης Κενού</option>
                                <option value="multiplechoice" @if ($question->type == 'multiplechoice') selected @endif>Πολλαπλής Επιλογής</option>
                            </x-select>

                        </div>

                        <div class="py-2">
                            <x-label class="py-2" for="first_name">Επίπεδο Δυσκολίας</x-label>

                            <x-select name="level">
                                <option value="easy" @if ($question->level == 'easy') selected @endif>Easy</option>
                                <option value="medium" @if ($question->level == 'medium') selected @endif>Medium</option>
                                <option value="hard" @if ($question->level == 'hard') selected @endif>Hard</option>
                            </x-select>
                        </div>


                        <div class="py-2">
                            <x-label class="py-2" for="title">Ερώτηση</x-label>
                            <x-input name="title" id="title" type="text" value="{{ $question->title }}"/>
                        </div>

                        <!-- Αν είναι true/flase μην κάνεις τίποτα παραπάνω-->
                        <!-- Αν είναι Συμπλήρωσης κενού μην κάνεις τίποτα παραπάνω-->
                        <!-- Αν είναι Πολλαπλών απαντήσεων ή Επιλογής όρισε τις πιθανές απαντήσεις-->

                        <div class="py-2">
                            <x-label class="py-2 text-green-600" for="corrects">Σωστή Απάντηση</x-label>
                            <x-input name="corrects" id="corrects" type="text" value="{{ $question->corrects }}"/>
                        </div>

                        <div id="hidediv1" style="display:none;" class="py-2">
                            <x-label class="py-2 font-semibold text-green-600" for="posanswers">Πιθανές απαντήσεις</x-label>
                            <span class="text-sm">Παρακαλούμε διαχωρίστε τις πιθανές απαντήσεις με κόμα (,)</span>
                            <x-textarea name="posanswers" id="posanswers" rows="5">{{ $question->posanswers }}</x-textarea>
                        </div>

                        <div id="hidediv2" style="display:none;" class="py-2">
                            <x-label class="py-2 text-red-600" for="wrongs">Λανθασμένες απαντήσεις</x-label>
                            <span class="text-sm">Παρακαλούμε διαχωρίστε τις λανθασμένες απαντήσεις με κόμα (,)</span>
                            <x-textarea name="wrongs" id="wrongs" rows="5">{{ $question->wrongs }}</x-textarea>
                        </div>


                        <div id="" style="" class="py-2">
                            <x-label class="py-2 text-red-400" for="wrongs">Έγκριση ερώτησης</x-label>
                            <span class="text-sm">Παρακαλούμε επιλέξτε αν θέλετε να εγκρίνετε την ερώτηση</span>
                            <input name="approval" id="approval" type="checkbox" @if ($question->level == 'easy') selected @endif />
                        </div>


                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('ΚΑΤΑΧΩΡΗΣΗ ΕΡΩΤΗΣΗΣ') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>



    function ShowElements() {
        var select = document.getElementById('type');
        var katastasi = select.options[select.selectedIndex].value;
        console.log(katastasi); // en



        if(katastasi == 'truefalse') {
            document.getElementById('hidediv1').style.display = "none";
            document.getElementById('hidediv2').style.display = "none";
        } else if (katastasi == 'multiplechoice') {
            document.getElementById('hidediv1').style.display = "inline";
            document.getElementById('hidediv2').style.display = "inline";
        }else if (katastasi == 'complete') {
            document.getElementById('hidediv1').style.display = "none";
            document.getElementById('hidediv2').style.display = "none";
        }
    }


    function ShowExtraDivs(val) {

        switch(val)
        {
            case "truefalse":
            {
                document.getElementById('hidediv1').style.display = "none";
                document.getElementById('hidediv2').style.display = "none";
                break;
            }
            case "multiplechoice":
            {
                document.getElementById('hidediv1').style.display = "inline";
                document.getElementById('hidediv2').style.display = "inline";
                break;
            }
            case "complete":
            {
                document.getElementById('hidediv1').style.display = "none";
                document.getElementById('hidediv2').style.display = "none";
                break;
            }
        }

    }

</script>
