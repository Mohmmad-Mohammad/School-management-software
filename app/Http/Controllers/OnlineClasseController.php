<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\Interfaces\OnlineClasseRepositoryInterface;
use Illuminate\Http\Request;


class OnlineClasseController extends Controller
{


    protected $OnlineClasse;

    public function __construct(OnlineClasseRepositoryInterface $OnlineClasse)
    {
        $this->OnlineClasse = $OnlineClasse;
    }
    public function index()
    {
    return  $this->OnlineClasse ->index();
    }

    public function create()
    {
        return  $this->OnlineClasse ->create();
    }

    public function indirectCreate()
    {
        return  $this->OnlineClasse ->indirectCreate();
    }

    public function store(Request $request)
    {
        return  $this->OnlineClasse ->store($request);
    }


    public function storeIndirect(Request $request)
    {
        return  $this->OnlineClasse ->storeIndirect($request);
    }


    public function destroy(Request $request)
    {
        return  $this->OnlineClasse ->destroy($request);
    }
}