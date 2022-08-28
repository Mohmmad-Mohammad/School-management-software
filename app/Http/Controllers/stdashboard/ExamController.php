<?php

namespace App\Http\Controllers\stdashboard;

use App\Http\Controllers\Controller;
use App\Models\Quizze;
use App\Repository\Interfaces\ExamDashboardRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{


    protected $Exam;

    public function __construct(ExamDashboardRepositoryInterface $Exam)
    {
        $this->Exam = $Exam;
    }

    public function index()
    {
    return  $this->Exam -> index();
    }

    
    public function show($quizze_id)
    {
        $student_id = Auth::user()->id;
        return view('pages.Students.dashboard.exams.show',compact('quizze_id','student_id'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}