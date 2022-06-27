<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Δημιουργία Νέας Ερώτησης') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('questions.store') }}">
                    @csrf

                        <div class="py-2">
                            <x-label class="py-2 text-green-600" for="type">Τύπος Ερώτησης</x-label>

                            <x-select onchange="ShowExtraDivs(this.value)" id="type" name="type">
                                <option value="truefalse">Σωστό/Λάθος</option>
                                <option value="complete">Συμπλήρωσης Κενού</option>
                                <option value="multiplechoice">Πολλαπλής Επιλογής</option>
                                <option value="singlechoice">Επιλογής</option>
                            </x-select>

                        </div>

                        <div class="py-2">
                            <x-label class="py-2" for="first_name">Επίπεδο Δυσκολίας</x-label>

                            <x-select name="level">
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>
                                <option value="hard">Hard</option>
                            </x-select>
                        </div>


                        <div class="py-2">
                            <x-label class="py-2" for="title">Ερώτηση</x-label>
                            <x-input name="title" id="title" type="text" />
                        </div>

                        <!-- Αν είναι true/flase μην κάνεις τίποτα παραπάνω-->
                        <!-- Αν είναι Συμπλήρωσης κενού μην κάνεις τίποτα παραπάνω-->
                        <!-- Αν είναι Πολλαπλών απαντήσεων ή Επιλογής όρισε τις πιθανές απαντήσεις-->

                        <div id="hidediv0" class="py-2">
                            <x-label class="py-2 text-green-600" for="corrects">Σωστή Απάντηση</x-label>
                            <span class="text-sm">Σε περίπτωση true/false απάντησης γράψτε 1 για true και 0 για false</span>
                            <x-input name="corrects" id="corrects" type="text" />
                        </div>


                        <div id="hidediv1" style="display:none;" class="py-2">
                            <x-label class="py-2 text-blue-400 text-bold" for="posanswers">Πιθανές απαντήσεις</x-label>
                            <span class="text-sm">Παρακαλούμε διαχωρίστε τις πιθανές απαντήσεις με κόμα (,)</span>
                            <x-textarea name="posanswers" id="posanswers" rows="5" />
                        </div>

                        <div id="hidediv2" style="display:none;" class="py-2">
                            <x-label class="py-2 text-red-400" for="wrongs">Λανθασμένες απαντήσεις</x-label>
                            <span class="text-sm">Παρακαλούμε διαχωρίστε τις λανθασμένες απαντήσεις με κόμα (,)</span>
                            <x-textarea name="wrongs" id="wrongs" rows="5" />
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

    function ShowExtraDivs(val) {
        switch(val)
        {
            case "truefalse":
            {
                document.getElementById('hidediv0').style.display = "inline";
                document.getElementById('hidediv1').style.display = "none";
                document.getElementById('hidediv2').style.display = "none";
                break;
            }
            case "multiplechoice":
            {
                document.getElementById('hidediv0').style.display = "none";
                document.getElementById('hidediv1').style.display = "inline";
                document.getElementById('hidediv2').style.display = "inline";
                break;
            }
            case "complete":
            {
                document.getElementById('hidediv0').style.display = "inline";
                document.getElementById('hidediv1').style.display = "none";
                document.getElementById('hidediv2').style.display = "none";
                break;
            }
            case "singlechoice":
            {
                document.getElementById('hidediv0').style.display = "inline";
                document.getElementById('hidediv1').style.display = "inline";
                document.getElementById('hidediv2').style.display = "none";
                break;
            }
        }

    }

</script>
