<?php

namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\Gender;
use App\Models\Image;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Repository\Interfaces\TeacherRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

        use AttachFilesTrait;
    public function getAllTeachers(){
        return Teacher::all();
    }

    public function Getspecialization(){
        return specialization::all();
    }

    public function GetGender(){
        return Gender::all();
    }

    public function StoreTeachers($request)
    {
        DB::beginTransaction();
        try {
            $Teachers = new Teacher();
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->specialization_id = $request->Specialization_id;
            $Teachers->gender_id = $request->Gender_id;
            $Teachers->joining_Date = $request->Joining_Date;
            $Teachers->address = $request->Address;
            $Teachers->photo = $request->file('photo')->getClientOriginalName();
            $Teachers->save();
            $this->uploadFile($request,'photo','teachers');
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.create');
        }
        catch (\Exception $e) {
            DB::rollBack();
            // return $e;
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }


    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->specialization_id = $request->Specialization_id;
            $Teachers->gender_id = $request->Gender_id;
            $Teachers->joining_Date = $request->Joining_Date;
            $Teachers->address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Teachers.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Teachers.index');
    }
}