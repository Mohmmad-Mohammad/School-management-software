<?php

namespace App\Repository;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\OnlineClasse;
use App\Models\Section;
use App\Models\Teacher;
use App\Repository\Interfaces\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Sections.Sections',compact('Grades','list_Grades','teachers'));
    }

    public function store($request)
    {
        try {
            $validated = $request->validated();
            $Sections = new Section();
            $Sections->name_section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->grade_id = $request->Grade_id;
            $Sections->class_id = $request->Class_id;
            $Sections->status = 1;
            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));
            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $Sections = Section::findOrFail($request->id);
            $Sections->name_section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->grade_id = $request->Grade_id;
            $Sections->class_id = $request->Class_id;
            if(isset($request->Status)) {
            $Sections->status = 1;
            } else {
            $Sections->status = 2;
            }
            // update pivot tABLE
            if (isset($request->teacher_id)) {
                $Sections->teachers()->sync($request->teacher_id);
            } else {
                $Sections->teachers()->sync(array());
            }
            $Sections->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Section.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Section.index');
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("name_class", "id");
        return $list_classes;
    }
}