<?php


namespace App\Repository\Interfaces;


interface ChildrenRepositoryInterface
{
    public function index();

    public function results($id);

    public function attendances();

    public function attendanceSearch($request);

    public function fees();

    public function receiptStudent($id);

    public function profile();

    public function update($request, $id);

}