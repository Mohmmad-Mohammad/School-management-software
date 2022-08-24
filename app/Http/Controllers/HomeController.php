<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\My_Parent;
use App\Models\MyParent;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('auth.selection');
    }
    public function dashboard()
    {
        $var['cs']=Student::count();
        $var['ct']=Teacher::count();
        $var['cp']=MyParent::count();
        $var['ide']=Event::latest()->take(5)->get();
        // $var['cs']=::count();
        return view('dashboard',$var);
    }

    public function destroy(Request $request)
    {
        Event::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }
}