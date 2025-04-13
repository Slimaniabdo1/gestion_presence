<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Exam;
use App\Models\Presence;

class StudentController extends Controller
{
    // page de recherche
    public function showSearchForm()
    {
        return view('search');
    }

    public function searchStudent(Request $request)
{
    $request->validate([
        'apogee' => 'required|numeric'
    ]);

    $apogee = $request->input('apogee');
    $student = Etudiant::where('apogee', $apogee)->with(['filiere', 'semestre'])->first();

    if (!$student) {
        return redirect()->route('search.form')->with('error', ' Etudiant nexist pas ');
    }

    // afficher exams
    $exams = Exam::join('module', 'exam.id_module', '=', 'module.id_module')
        ->where('module.id_filiere', $student->id_filiere)
        ->select('exam.*')
        ->get();

    // dd($exams); // tester le variable   $exams

    return view('student', compact('student', 'exams'));
}



    public function confirmPresence(Request $request)
    {

        // dd($request->method()); // affiche method post ou get
        // dd($request->all());  // affiche tous les champs du formulaire
        // dd($request->input('student_id')); // affiche le champ student_id
        // dd($request->input('exam_id')); // affiche le champ exam_id

        $request->validate([
            'student_id' => 'required|numeric',
            'exam_id' => 'required|numeric'
        ]);

        $presence = Presence::where('id_etudiant', $request->input('student_id'))
                            ->where('id_exam', $request->input('exam_id'))
                            ->first();

        //dd($presence);


        if (!$presence) {
            return back()->with('error', ' Exam nexist pas ');
        }

        $presence->present = 'present';
        //$presence->update(['present' => 'present']);

        $presence->save();
        $presence->touch();

        return back()->with('success', ' Valider Presence success   ');
        // return redirect()->route('search.form')->with('success', ' Valider Presence success   ');
    }
}
