<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\OnlineClasse;
use App\Repository\Interfaces\OnlineZoomClassesRepositoryInterface;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineZoomClassesController extends Controller
{
    use MeetingZoomTrait;

    protected $OnlineZoomClasses;

    public function __construct(OnlineZoomClassesRepositoryInterface $OnlineZoomClasses)
    {
        $this->OnlineZoomClasses = $OnlineZoomClasses;
    }

    public function index()
    {
        return $this->OnlineZoomClasses ->index();
    }

    public function create()
    {
        return $this->OnlineZoomClasses ->create();
    }

    public function indirectCreate()
    {
        return $this->OnlineZoomClasses ->indirectCreate();

    }


    public function store(Request $request)
    {
        return $this->OnlineZoomClasses ->store($request);

    }

    public function storeIndirect(Request $request)
    {
        return $this->OnlineZoomClasses ->storeIndirect($request);

    }

    public function destroy(Request $request,$id)
    {
        return $this->OnlineZoomClasses ->destroy($request,$id);

    }
}