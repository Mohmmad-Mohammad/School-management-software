<?php

namespace App\Http\Controllers\stdashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use AttachFilesTrait;

    public function index()
    {
        $information = Student::findorFail(auth()->user()->id);
        return view('pages.Students.dashboard.profile', compact('information'));
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
        $information = Student::findorFail($id);

        if (!empty($request->password)) {
            $information->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            $information->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->photo = $request->file('photo')->getClientOriginalName();
            $information->save();
            $this->uploadFile($request,'photo','profile');
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}