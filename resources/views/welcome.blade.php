<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class=" fixed top-0 right-0 px-6 py-4 sm:block lg:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ΑΡΧΙΚΗ</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ΣΥΝΔΕΣΗ</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">ΕΓΓΡΑΦΗ</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="shrink-0 flex items-center px-8 py-8">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1">
                        <div class="p-12">
                            <h1 class="font-bold text-lg m-2 ml-0">Dark-Deep Web Crawling</h1>
                            <p class="py-4 my-4">Καλώς ήρθατε στην ιστοσελίδα μας.</p>
                            <p class="py-4 my-4"><strong><em>Σε αυτή την ιστοσελίδα θα αναλύσουμε τις έννοιες Deep-Dark Web και ποια εργαλεία ή τεχνολογίες χρειάζονται για την προσπέλαση τους. Αρχικά θα αναλύσουμε τα επίπεδα του διαδικτύου, το Surface Web, το Deep Web και το Dark Web. Στη συνέχεια  θα εξηγήσουμε την τεχνολογία TOR.  Έπειτα θα αναφερθούμε στις μηχανές αναζήτησης στο Dark Web.</em></strong>
                            </p>
                            <div class="bg-indigo-300">
                                <img src="images/crawl.png" class="object-cover">
                            </div>
                            <p class="py-4 my-4">Το διαδίκτυο και οι τεχνολογίες του διαδικτύου τα τελευταία χρόνια έχουν εξελιχθεί πολύ. Οι ερευνητές διαφόρων ειδικοτήτων προσθέτουν νέες υπηρεσίες και ευκολίες για διαφορετικούς τύπους χρηστών από ιδιώτες μέχρι και δημόσιες υπηρεσίες. Οι χρήστες όλο και περισσότερο χρησιμοποιούν το διαδίκτυο για την ψυχαγωγία τους, την εργασία τους, τις συναλλαγές τους με τράπεζες & ασφαλιστικά ταμεία ακόμα και για τις αγορές τους. Συγχρόνως η συλλογή προσωπικών δεδομένων από όλες τις υπηρεσίες έχει πάρει τεράστιες διαστάσεις. Γι’ αυτό το λόγο  όλο και περισσότεροι χρήστες ζητούν το απόρρητο των δεδομένων και των συναλλαγών τους.</p>
                            <p class="py-4 my-3">
                                Οι επιστήμονες κατάφεραν να καλύψουν ένα μέρος των απαιτήσεων των χρηστών δημιουργώντας το Deep Web που αποτελεί το μεγαλύτερο μέρος του διαδικτύου. Αυτό το μέρος αποτελεί ένα ασφαλές μέρος για χρήστες που επιθυμούν  να χρησιμοποιήσουν το διαδίκτυο και παράλληλα να διατηρήσουν το απόρρητο της σύνδεσής τους. Αυτό επιτυγχάνεται με ειδικές τεχνολογίες κρυπτογράφησης της σύνδεσης και την ανακατευθύνουν μέσω διαδοχικών κόμβων. </p>
                            <p class="py-4 my-4"> Όμως αυτή την τεχνολογία την εκμεταλλεύτηκαν και  χρήστες με παράνομες δραστηριότητες όπως διακίνηση παράνομων ουσιών, όπλων, πορνογραφία, κακόβουλο λογισμικό, λογισμικό πειρατείας, πλαστογραφία και πολλά άλλα.
                            </p>
                        </div>

                        <div class="p-12">
                            <h2 class="font-bold text-lg m-2 ml-0">Dark Web</h2>

                            <h2 class="font-bold text-lg m-2 ml-0">Επίπεδα Διαδικτύου</h2>
                            <p class="py-4 my-3">Διαδίκτυο είναι ένα σύνολο υπολογιστών και δικτύων που συνδέονται μεταξύ τους σε ένα παγκόσμιο δίκτυο ώστε να μπορούν να επικοινωνούν οι χρήστες. Καθημερινά στο διαδίκτυο διακινούνται πλήθος δεδομένων σε διάφορες μορφές κείμενο, video, φωτογραφίες. Οι λόγοι που το χρησιμοποιεί ο κάθε χρήστης ποικίλει ανάλογα με τις ανάγκες του. Μερικοί λόγοι για τους οποίους χρησιμοποιείται το διαδίκτυο είναι  για την εργασία,  για την εκπαίδευση, για τις αγορές αλλά και την ψυχαγωγία των χρηστών. Αυτό το κομμάτι του διαδικτύου είναι ένα μικρό μέρος του διαδικτύου και το χωρίζουμε σε τρία επίπεδα το πρώτο είναι το Surface Web, το δεύτερο είναι το Deep Web και το τρίτο το Dark Web.
                                <img src="images/pagovouno.jpg" class="object-cover">
                            </p>

                            <h2 class="font-bold text-lg m-2 ml-0">Surface Web</h2>
                            <p class="py-4 my-3">
                                To Surface Web είναι το μέρος του διαδικτύου που χρησιμοποιούμε περισσότερο και όλοι γνωρίζουμε. Είναι το πρώτο επίπεδο του διαδικτύου. Είναι γνωστό επίσης και με  τα ονόματα Lightnet ή Indexed Web. Αυτό το επίπεδο είναι προσβάσιμο  απ’ όλους τους κλασικούς φυλλομέτρητες όπως Mozilla Firefox, Microsoft's Internet Explorer ή Edge, και Google Chrome. Σύμφωνα με το Wikipedia στο surface web είναι μόλις το 6% των πληροφοριών του διαδικτύου. Μερικά παραδείγματα γνωστών ιστοσελίδων είναι το Facebook, Youtube, Wikipedia κα.</p>
                            <p class="py-4 my-3">
                                Το πρωτόκολλο επικοινωνίας που χρησιμοποιείται είναι το HTTP (HyperText Transfer Protocol) και πλέον το HTTPS. Αποτελεί το κύριο πρωτόκολλο στους φυλλομετρητές του Παγκοσμίου Ιστού για να μεταφέρει δεδομένα ανάμεσα σε έναν διακομιστή (server) και έναν πελάτη (client). Παρέχει σχετικά χαμηλή ανωνυμία και η ταυτοποίηση των χρηστών γίνεται μέσω της διεύθυνσης IP τους.</p>
                            <p class="py-4 my-3">
                                Οι μηχανές αναζήτησης ευρετηριάζουν τις σελίδες μέσω προγραμμάτων bot ή crawler. Όταν ένα bot σαρώνει μια ιστοσελίδα ελέγχει για συνδέσμους προς άλλες σελίδες και στη συνέχεια σαρώνει διαδοχικά τις σελίδες. Ευρετηριάζει τις σελίδες σε μια βάση κρατώντας στοιχεία από λέξεις κλειδιά που περιγράφουν το περιεχόμενο τις σελίδας. Έτσι όταν ένας χρήστης πραγματοποιεί μια αναζήτηση η μηχανή αναζήτησης αντιστοιχεί την λέξη αναζήτησης με την λέξη στο ευρετήριο και έτσι εμφανίζονται τα αποτελέσματα.
                            </p>

                            <h2 class="font-bold text-lg m-2 ml-0">Deep Web</h2>

                            <p class="py-4 my-3">
                                Με τον όρο Deep Web εννοούμε όλες εκείνες τις ιστοσελίδες που δεν μπορούν να εντοπίστουν με τις συνηθισμένες μηχανές αναζήτησης. Οι συνηθισμένες μηχανές αναζήτησης χρησιμοποιούνε crawler για να ευρετηριάσουν όλες  τις σελίδες που επισκέπτεται. Με λίγα λόγια μόλις ένας crawler επισκεφτεί μία ιστοσελίδα ελέγχει για συνδέσμους προς άλλες σελίδες και τις επισκέπτεται. Με αυτό τον τρόπο δημιουργείται ένας κατάλογος των διαθέσιμων ιστοσελίδων με τις λέξεις κλειδιά που αντιπροσωπεύουν κάθε ιστοσελίδα. Έτσι κάθε φορά που ένας χρήστης κάνει μία αναζήτηση χρησιμοποιώντας κάποια λέξη-κλειδί η μηχανή αναζήτησης απλά αντιστοιχεί αυτήν την λέξη με τις λέξεις κλειδιά που έχει στον κατάλογο της και εμφανίζει τα αποτελέσματα. </p>
                            <p class="py-4 my-3">
                                Όσες σελίδες περιέχουν κωδικούς πρόσβασης τα crawlers δεν έχουν πρόσβαση για λόγους ασφαλείας. Άρα όλες αυτές οι ιστοσελίδες θεωρούνται Deep Web. Παραδείγματα τέτοιων ιστοσελίδων είναι το Facebook, forums, ιδιωτικά video στο YouTube, τραπεζικοί λογαριασμοί, paypal κα.
                            </p>
                            <p class="py-4 my-3">
                                Υπάρχουν και ιστοσελίδες που οι ιδιοκτήτες τους έχουν απαγορέψει την πρόσβαση σε crawlers. Ένας τρόπος για να το πετύχει κάποιος αυτό είναι  να δημιουργήσει ένα αρχείο robots.txt και να το τοποθετήσει στον root φάκελο της ιστοσελίδας του. Σε αυτό το αρχείο ορίζουμε σε ποια URL έχει πρόσβαση ένα crawler. Στην ετικέτα User-agent συμπληρώνουμε αστεράκι (*) αν αφορά όλους τους crawlers, διαφορετικά πληκτρολογούμε το όνομα του crawler. Στην ετικέτα Allow πληκτρολογούμε σε ποιον φάκελο θα έχει πρόσβαση ο crawler και στην ετικέτα Disallow σε ποιον φάκελο απαγορεύεται η πρόσβαση. </p>

                            <p class="py-4 my-3">Στο παρακάτω παράδειγμα φαίνεται ένα αρχείο robots.txt το οποίο  επιτρέπει την πρόσβαση σε όλους τους crawlers.
                            </p>
                            <p class="mypre">
                                User-agent: * <br>
                                Allow: /
                            </p>



                            <p class="py-4 my-3">Ένα άλλο παράδειγμα αρχείου robots.txt φαίνεται αμέσως παρακάτω στο οποίο ο crawlers με το όνομα Googlebot έχει πρόσβαση σε όλη την ιστοσελίδα έκτος από τον φάκελο και τους υποφακέλους του /my_articles/

                            </p>
                            <p class="mypre">
                                User-agent: Googlebot<br>
                                Disallow: /my_articles/
                            </p>


                            <p class="py-4 my-3">
                                Υπάρχει και ένας άλλος τρόπος  ώστε η ιστοσελίδα να μην υπάρχει στα αποτελέσματα αναζήτησης των μηχανών αναζήτησης. Αυτός ο τρόπος είναι να ορίσουμε στο headers της ιστοσελίδας metatags. Στην ετικέτα name ορίζουμε το όνομα του bots ή crawlers και στην ετικέτα content για να μην γίνει η ευρετηρίαση θα πρέπει να πληκτρολογηθεί η τιμή no index όπως φαίνεται στην παρακάτω εικόνα.
                            </p>


                            <p class="py-4 my-3">
                                Υπολογίζεται ότι το 96% των ιστοσελίδων ανήκει στο Deep Web.<br>
                                <strong>To Deep Web το χωρίζουμε σε δύο περιοχές σύμφωνα με τις δραστηριότητες των χρηστών:</strong>
                            <ul>
                                <li><strong>Νόμιμες δραστηριότητες</strong></li>
                                Περιέχει βάσεις δεδομένων, βιβλιοθήκες, ή απλές ιστοσελίδες χρηστών ή ομάδων, όπως αστυνομία, δυνάμεις ασφαλείας και στρατιωτικές δυνάμεις, ΜΜΕ κα, που προτιμούν το deep web για τις δραστηριότητες τους για να κρατήσουν την ανωνυμία τους.

                                <li><strong>Παράνομες δραστηριότητες</strong></li>
                                Είναι όλες εκείνες οι δραστηριότητες που χαρακτηρίζονται ως παράνομες και αυτό ονομάζεται το Dark Web.

                            </ul>
                            </p>


                            <h2 class="font-bold text-lg m-2 ml-0">2.3	Dark Web</h2>

                            <p class="py-4 my-3">
                                Το Dark Web αποτελεί ένα κομμάτι του Deep Web. Σε αυτό το κομμάτι του διαδικτύου δεν έχουν πρόσβαση οι κλασικοί φυλλομετρητές όπως Firefox, Google Chrome, Safari Internet Explorer γιατί δεν χρησιμοποιεί το πρωτόκολλο επικοινωνίας HTTP.
                                To Dark Web ξεκίνησε με το APRANET, τον πρόγονο του διαδικτύου, το οποίο το ανέπτυξε το πεντάγωνο το 1969. Καθώς η αλληλεπίδραση μεταξύ των υπολογιστών άρχισε να αυξάνεται, άρχισαν να κάνουν την εμφάνιση τους μεμονωμένα μυστικά δίκτυα παράλληλα με το ARPANET. Έτσι το Εργαστήριο Ερευνών του Ναυτικού των ΗΠΑ επέλεξε αυτά τα δίκτυα και παρουσίασε το πρόγραμμα περιήγησης  The Onion Router ή TOR το οποίο το δημιούργησε ως μέτρο ασφάλειας. Ουσιαστικά το TOR αποκρύπτει την τοποθεσία και τις διευθύνσεις IP  των χρηστών που το χρησιμοποιούνε. Το λογισμικό αυτό έγινε διαθέσιμο το 2004.


                                <img src="images/tor.png" class="object-cover">
                            </p>
                            <p class="py-4 my-3">
                                Οι ιστοσελίδες στο Dark Web τρέχουν πίσω από πολλαπλά επίπεδα κρυπτογράφησης μη επιτρέποντας την πρόσβαση στις μηχανές αναζήτησης. Οι περισσότερες ιστοσελίδες στο Dark Web χρησιμοποιούν το TOR. Άλλα εργαλεία κρυπτογράφησης είναι το I2P που κάνει παρόμοια δουλειά. Κυριαρχεί η μυστικότητα και η απόκρυψη της ταυτότητας τόσο από την πλευρά του χρήστη όσο και από τους δημιουργούς των ιστοσελίδων, παρ’ ολ’ αυτά τα τελευταία χρόνια οι υπηρεσίες καταπολέμησης ηλεκτρονικού εγκλήματος έχουν την τεχνογνωσία και πολλές φορές ανακαλύπτουν τις παράνομες δραστηριότητες.
                            </p>
                            <p class="py-4 my-3">
                                Στο Dark Web πραγματοποιούνται αρκετές παράνομες δραστηριότητες όπως είναι το εμπόριο ναρκωτικών, εμπόριο όπλων, παράνομο λογισμικό, εμπόριο ευαίσθητων πληροφοριών, εκμετάλλευση στοιχείων που ανακάλυπτουν hackers από συστήματα υπολογιστών κα. Ακόμα περιλαμβάνει οικονομικές απάτες, δημοσιοποίηση εγκληματολογικών ιδεών κα.
                            </p>
                            <p class="py-4 my-3">
                                Μία από τις δημοφιλέστερες ιστοσελίδες στο Dark Web ήταν το Silk Road. Το Silk Road ήταν μία ιστοσελίδα αγοραπωλησίας ναρκωτικών, όπλων και άλλων επικίνδυνων και παράνομων προϊόντων. Δημιουργήθηκε το 2011 αλλά το 2013 το έκλεισε το FBI.
                                Το Dark Web περιλαμβάνει ένα τεράστιο όγκο πληροφοριών στο Διαδίκτυο που στην πλειοψηφία του είναι απρόσιτο για έναν απλό χρήστη.  Χρειάζεται έναν ειδικό φυλλομετρητή κρυπτογραφίας όπως το TOR.
                            </p>

                            <h2 class="font-bold text-lg m-2 ml-0">Στα επόμενα κεφάλαια</h2>
                            <p class="py-4 my-3">
                                Στα επόμενα κεφάλαια θα δούμε:

                            <ul>
                                <li>TOR - The Onion Router</li>
                                <li>Μηχανές αναζήτησης στο Dark Web</li>
                                <li>Πρόσβαση στο Dark Web</li>
                                <li>Web Crawling</li>
                                <li>Παράδειγμα Crawling και Εξαγωγή Data </li>
                                <li>Επιθέσεις στο Web</li>
                                <li>Ασφάλεια στο Dark web </li>
                            </ul>

                            </p>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
