<?php


namespace App\Repository\Interfaces;


interface StudentPromotionRepositoryInterface
{
    public function index();

    public function store($request);

    public function create();

    public function destroy($request);

    public function edit($request);
}