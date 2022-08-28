<?php


namespace App\Repository\Interfaces;


interface ProfileRepositoryInterface
{
    public function index();
    
    public function update($request, $id);

}