<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Image;
use App\Models\Teacher;
use App\Repository\Interfaces\ProfileRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use AttachFilesTrait;

    protected $Profile;

    public function __construct(ProfileRepositoryInterface $Profile)
    {
        $this->Profile = $Profile;
    }

    public function index()
    {
        return $this->Profile -> index();
    }

    public function update(Request $request, $id)
    {
        return $this->Profile -> update($request, $id);
    }
}