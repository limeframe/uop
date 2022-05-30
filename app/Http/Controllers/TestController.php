<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myTests = Test::where("user_id",Auth::id())->orderByDesc('created_at')->get();
        return view('tests.index',compact('myTests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }

    public function randomTest(Request $request)
    {
        $getLevel = $request->theLevel;
        $getRandomQuestions = Question::where('level',$getLevel)->where('approval',1)->inRandomOrder()->limit(5)->get();
        return view('tests.view',compact('getRandomQuestions'));
    }

    public function submitTest(Request $request)
    {
        $data = $request->all();

        $array = array();

        $counter = 0;

        foreach ($data as $key => $value) {

            if(str_starts_with($key, 'apantisi-')) {

                $counter = $counter + 1;

                $requestPieces = explode("-", $key);

                $erotisi[$counter] = $requestPieces[1];

                $apantisi[$counter] = $value;

            }

        }

        //Έλεγχος αποτελεσμάτων

        $getErotisi_1 = Question::where('id',$erotisi[1])->first();
        $getErotisi_2 = Question::where('id',$erotisi[2])->first();
        $getErotisi_3 = Question::where('id',$erotisi[3])->first();
        $getErotisi_4 = Question::where('id',$erotisi[4])->first();
        $getErotisi_5 = Question::where('id',$erotisi[5])->first();
        echo $apantisi[3];
        if($apantisi[1] == 'ok') { $apantisi[1] = 1; } elseif($apantisi[1] == 'notok') { $apantisi[1] = 0; } else ( $apantisi[1] == $apantisi[1] );
        if($apantisi[2] == 'ok') { $apantisi[2] = 1; } elseif($apantisi[2] == 'notok') { $apantisi[2] = 0; } else ( $apantisi[2] == $apantisi[2] );
        if($apantisi[3] == 'ok') { $apantisi[3] = 1; } elseif($apantisi[3] == 'notok') { $apantisi[3] = 0; } else ( $apantisi[3] == $apantisi[3] );
        if($apantisi[4] == 'ok') { $apantisi[4] = 1; } elseif($apantisi[4] == 'notok') { $apantisi[4] = 0; } else ( $apantisi[4] == $apantisi[4] );
        if($apantisi[5] == 'ok') { $apantisi[5] = 1; } elseif($apantisi[5] == 'notok') { $apantisi[5] = 0; } else ( $apantisi[5] == $apantisi[5] );

        $result_1 = checkResult($getErotisi_1->type,$getErotisi_1->corrects,$apantisi[1]);
        $result_2 = checkResult($getErotisi_2->type,$getErotisi_2->corrects,$apantisi[2]);
        $result_3 = checkResult($getErotisi_3->type,$getErotisi_3->corrects,$apantisi[3]);
        $result_4 = checkResult($getErotisi_4->type,$getErotisi_4->corrects,$apantisi[4]);
        $result_5 = checkResult($getErotisi_5->type,$getErotisi_5->corrects,$apantisi[5]);

        $fResult = ($result_1 + $result_2 + $result_3 + $result_4 + $result_5) / 5;
        if ($fResult >= 60) {
            $res = "SUCCESS";
        } else {
            $res = "FAIL";
        }

        /*
        echo $fResult . '+++++++' . $res;
        echo '<table>';
        echo '<tr><td>Ερώτηση</td><td>Σωστό</td><td>Απάντηση</td><td>Αποτεέλεσμα</td>';
        echo '<tr><td>'.$getErotisi_1->title.'</td><td>'.$getErotisi_1->corrects.'</td><td>'.$apantisi[1].'</td><td>'.$result_1.'</td>';
        echo '<tr><td>'.$getErotisi_2->title.'</td><td>'.$getErotisi_2->corrects.'</td><td>'.$apantisi[2].'</td><td>'.$result_2.'</td>';
        echo '<tr><td>'.$getErotisi_3->title.'</td><td>'.$getErotisi_3->corrects.'</td><td>'.$apantisi[3].'</td><td>'.$result_3.'</td>';
        echo '<tr><td>'.$getErotisi_4->title.'</td><td>'.$getErotisi_4->corrects.'</td><td>'.$apantisi[4].'</td><td>'.$result_4.'</td>';
        echo '<tr><td>'.$getErotisi_5->title.'</td><td>'.$getErotisi_5->corrects.'</td><td>'.$apantisi[5].'</td><td>'.$result_5.'</td>';
        echo '</table>';

        */

        $tst = new Test;
        $tst->user_id       = Auth::id();
        $tst->erotisi_1     = $erotisi[1];
        $tst->erotisi_2     = $erotisi[2];
        $tst->erotisi_3     = $erotisi[3];
        $tst->erotisi_4     = $erotisi[4];
        $tst->erotisi_5     = $erotisi[5];
        $tst->apantisi_1    = $apantisi[1];
        $tst->apantisi_2    = $apantisi[2];
        $tst->apantisi_3    = $apantisi[3];
        $tst->apantisi_4    = $apantisi[4];
        $tst->apantisi_5    = $apantisi[5];
        $tst->apot_1        = $result_1;
        $tst->apot_2        = $result_2;
        $tst->apot_3        = $result_3;
        $tst->apot_4        = $result_4;
        $tst->apot_5        = $result_5;
        $tst->pososto       = $fResult;
        $tst->apotelesma        = $res;

        $tst->save();

        return redirect()->route('tests.index')
                         ->with("message", "Το τεστ ολοκληρώθηκε! Δείτε παρακάτω τα αποτελέσματα όλων των τεστ σας.");



    }
}
