<?php

namespace App\Http\Controllers\stdashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Repository\Interfaces\ProfileDashboardRepositoryInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use AttachFilesTrait;


    protected $Profile;

    public function __construct(ProfileDashboardRepositoryInterface $Profile)
    {
        $this->Profile = $Profile;
    }

    public function index()
    {
    return  $this->Profile ->index();

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request,$id)
    {
    return  $this->Profile ->update($request,$id);
    }


    public function destroy($id)
    {
        //
    }
}