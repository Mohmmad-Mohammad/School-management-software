<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Repository\Interfaces\QuestionTeacherRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    protected $QuestionTeacher;

    public function __construct(QuestionTeacherRepositoryInterface $QuestionTeacher)
    {
        $this->QuestionTeacher = $QuestionTeacher;
    }

    public function store(Request $request)
    {
        return  $this->QuestionTeacher ->store($request);
    }

    public function show($id)
    {
        return  $this->QuestionTeacher ->show($id);
    }

    public function edit($id)
    {
        return  $this->QuestionTeacher ->edit($id);
    }

    public function update(Request $request, $id)
    {
        return  $this->QuestionTeacher ->update($request, $id);
    }

    public function destroy($id)
    {
        return  $this->QuestionTeacher ->destroy($id);
    }
}