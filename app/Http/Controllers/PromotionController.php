<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\Interfaces\StudentPromotionRepositoryInterface as InterfacesStudentPromotionRepositoryInterface;
use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    protected $Promotion;
    public function __construct(InterfacesStudentPromotionRepositoryInterface $Promotion)
    {
        $this->Promotion = $Promotion;
    }

    public function index()
    {
        return $this->Promotion->index();
    }


    public function create()
    {
        return $this->Promotion->create();
    }


    public function store(Request $request)
    {
        return $this->Promotion->store($request);
    }


    public function show($id)
    {
        //
    }

    public function edit(Request $request)
    {
        //Soft delete
        return $this->Promotion->edit($request);
    }

    public function destroy(Request $request)
    {
        return $this->Promotion->destroy($request);
    }
}