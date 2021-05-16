<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Auth;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ExportsController extends Controller {

    public function csv($testId) {
        $fileName = "test_${testId}_students_results.csv";

        $test = Test::where('user_id', Auth::id())
            ->where('id', $testId)
            ->first();

        $exams = $test->exams;


        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('AIS ID', 'Meno', 'Priezvisko', 'Pocet bodov');

        $callback = function() use($exams, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($exams as $exam) {
                $row['AIS ID']  = $exam->student->ais_id;
                $row['Meno']    = $exam->student->firstname;
                $row['Priezvisko']    = $exam->student->lastname;
                $row['Pocet Bodov']  = $exam->total_points;

                fputcsv($file, array(
                    $row['AIS ID'],
                    $row['Meno'],
                    $row['Priezvisko'],
                    $row['Pocet Bodov']
                ));
            }

            fclose($file);
        };

        return response()->streamDownload($callback, 200, $headers);
    }

    public function pdf($testId) {
        // retreive all records from db
        $test = Test::where('user_id', Auth::id())
            ->where('id', $testId)
            ->first();

        // share data to view
        view()->share('test',$test);

        //return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();

        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed'=> TRUE,
                'enable_remote'=> TRUE,
                'chroot'  => public_path('storage/app'),
            ]
        ]);
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('students_test_detail', $test);

        $pdf->getDomPDF()->setHttpContext($contxt);

        /*$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('students_test_detail', $test);*/

        // download PDF file with download method
        return $pdf->download("test_$test->name.pdf");
    }
}
