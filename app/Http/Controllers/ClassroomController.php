<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Repository\Interfaces\ClassroomRepositoryInterface;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    protected $Classroom;

    public function __construct(ClassroomRepositoryInterface $Classroom)
    {
        $this->Classroom = $Classroom;
    }

    public function index()
    {
        return  $this->Classroom -> index();
    }


    public function store(ClassroomRequest $request)
    {
        return  $this->Classroom -> store($request);
    }


    public function update(Request $request)
    {
        return  $this->Classroom -> update($request);

    }

    public function destroy(Request $request)
    {
        return  $this->Classroom -> destroy($request);
    }


    public function delete_all(Request $request)
    {
        return  $this->Classroom -> delete_all($request);
    }

    public function Filter_Classes(Request $request)
    {
        return  $this->Classroom -> Filter_Classes($request);
    }
}

?>