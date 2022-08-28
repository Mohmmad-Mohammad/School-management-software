<?php

namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\Student;
use App\Repository\Interfaces\ProfileDashboardRepositoryInterface;
use Illuminate\Support\Facades\Hash;



class ProfileDashboardRepository implements ProfileDashboardRepositoryInterface
{
    use AttachFilesTrait;

    public function index()
    {
        $information = Student::findorFail(auth()->user()->id);
        return view('pages.Students.dashboard.profile', compact('information'));
    }

    public function update($request,$id)
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
}