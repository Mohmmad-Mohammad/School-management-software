<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $Setting;

    public function __construct(SettingRepositoryInterface $Setting)
    {
        $this->Setting = $Setting;
    }

    public function index()
    {
        return $this->Setting->index();
    }

    public function update(Request $request)
    {
        return $this->Setting->update($request);
    }
}