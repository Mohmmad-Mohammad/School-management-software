<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Repository\Interfaces\QuizzTeacherRepositoryInterface;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    protected $Quizz;

    public function __construct(QuizzTeacherRepositoryInterface $Quizz)
    {
        $this->Quizz = $Quizz;
    }

    public function index()
    {
        return  $this->Quizz ->index();
    }

    public function create()
    {
        return  $this->Quizz ->create();
    }

    public function store(Request $request)
    {
        return  $this->Quizz ->store($request);
    }

    public function edit($id)
    {
        return  $this->Quizz -> edit($id);
    }

    public function show($id)
    {
        return  $this->Quizz ->show($id);
    }

    public function update(Request $request)
    {
        return  $this->Quizz ->update($request);
    }

    public function destroy($id)
    {
        return  $this->Quizz ->destroy($id);
    }

    public function student_quizze($quizze_id)
    {
        return  $this->Quizz ->student_quizze($quizze_id);
    }

    public function repeat_quizze(Request $request)
    {
        return  $this->Quizz ->repeat_quizze($request);
    }


}