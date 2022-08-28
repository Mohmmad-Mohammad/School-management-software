<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Repository\Interfaces\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $Section;

    public function __construct(SectionRepositoryInterface $Section)
    {
        $this->Section = $Section;
    }

    public function index()
    {
        return $this->Section -> index();
    }

    public function store(SectionRequest $request)
    {
        return $this->Section -> store($request);
    }


    public function update(SectionRequest $request)
    {
        return $this->Section -> update($request);

    }

    public function destroy(Request $request)
    {
        return $this->Section -> destroy($request);
    }


    public function getclasses($id)
    {
        return $this->Section -> getclasses($id);

    }
}