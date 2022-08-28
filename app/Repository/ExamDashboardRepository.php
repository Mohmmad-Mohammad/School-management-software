<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Student;
use App\Repository\Interfaces\ExamDashboardRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ExamDashboardRepository implements ExamDashboardRepositoryInterface
{

    public function index()
    {
        $quizzes = Quizze::where('grade_id', auth()->user()->grade_id)
        ->where('classroom_id', auth()->user()->classroom_id)
        ->where('section_id', auth()->user()->section_id)
        ->orderBy('id', 'DESC')
        ->get();
    return view('pages.Students.dashboard.exams.index', compact('quizzes'));
    }

    public function show($quizze_id)
    {
        $student_id = Auth::user()->id;
        return view('pages.Students.dashboard.exams.show',compact('quizze_id','student_id'));
    }

}