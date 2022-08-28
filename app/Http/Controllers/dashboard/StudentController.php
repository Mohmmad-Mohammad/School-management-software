<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Repository\Interfaces\StudentdashboardRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    protected $Studentdashboard;

    public function __construct(StudentdashboardRepositoryInterface $Studentdashboard)
    {
        $this->Studentdashboard = $Studentdashboard;
    }

    public function index()
    {
        return  $this->Studentdashboard ->index();
    }

    public function sections()
    {
        return  $this->Studentdashboard ->sections();
    }

    public function attendance(Request $request)
    {
        return  $this->Studentdashboard ->attendance($request);
    }

    public function editAttendance(Request $request)
    {
        return  $this->Studentdashboard ->editAttendance($request);
    }

    public function attendanceReport()
    {
        return  $this->Studentdashboard ->attendanceReport();
    }

    public function attendanceSearch(Request $request)
    {
        return  $this->Studentdashboard ->attendanceSearch($request);
    }


}