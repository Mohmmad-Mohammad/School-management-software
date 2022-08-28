<?php


namespace App\Repository\Interfaces;


interface ProfileDashboardRepositoryInterface
{
    public function index();

    public function update($request,$id);

}