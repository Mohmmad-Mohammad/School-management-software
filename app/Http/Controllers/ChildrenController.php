<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\Interfaces\ChildrenRepositoryInterface;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{

    protected $Children;

    public function __construct(ChildrenRepositoryInterface $Children)
    {
        $this->Children =$Children;
    }

    public function index()
    {
        return $this->Children -> index();
    }

    public function results($id)
    {
        return $this->Children -> results($id);
    }

    public function attendances()
    {
        return $this->Children -> attendances();
    }

    public function attendanceSearch(Request $request)
    {
        return $this->Children -> attendanceSearch($request);
    }

    public function fees()
    {
        return $this->Children -> fees();
    }

    public function receiptStudent($id)
    {
        return $this->Children -> receiptStudent($id);
    }

    public function profile()
    {
        return $this->Children -> profile();
    }

    public function update(Request $request, $id)
    {
        return $this->Children -> update($request, $id);
    }

}