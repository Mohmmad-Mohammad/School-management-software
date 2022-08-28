<?php

namespace App\Repository\Interfaces;


interface ExamDashboardRepositoryInterface
{
    public function index();

    public function show($quizze_id);

}