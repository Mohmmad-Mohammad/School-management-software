<?php

namespace App\Repository\Interfaces;


interface QuizzTeacherRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($id);

    public function show($id);

    public function student_quizze($quizze_id);

    public function repeat_quizze($request);

}