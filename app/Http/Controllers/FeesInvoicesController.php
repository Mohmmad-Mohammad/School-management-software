<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\FeeInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeesInvoicesController extends Controller
{

    protected $FeeInvoice;
    public function __construct(FeeInvoicesRepositoryInterface $FeeInvoice)
    {
        $this->FeeInvoice = $FeeInvoice;
    }

    public function index()
    {
        return $this->FeeInvoice->index();
    }



    public function store(Request $request)
    {
        return $this->FeeInvoice->store($request);
    }


    public function show($id)
    {
        return $this->FeeInvoice->show($id);
    }


    public function edit($id)
    {
        return $this->FeeInvoice->edit($id);
    }


    public function update(Request $request)
    {
        return $this->FeeInvoice->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->FeeInvoice->destroy($request);
    }
}
