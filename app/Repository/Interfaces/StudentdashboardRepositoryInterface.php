<?php

namespace App\Repository\Interfaces;


interface StudentdashboardRepositoryInterface
{
    public function index();

    public function sections();

    public function attendance($request);

    public function editAttendance($request);

    public function attendanceReport();

    public function attendanceSearch($request);

    
}