<?php


namespace App\Repository\Interfaces;

interface OnlineZoomClassesRepositoryInterface
{

    public function index();

    public function create();

    public function indirectCreate();

    public function store($request);

    public function storeIndirect($request);

    public function destroy($request,$id);






}