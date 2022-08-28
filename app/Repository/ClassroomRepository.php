<?php


namespace App\Repository;


use App\Models\Classroom;
use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Repository\Interfaces\ClassroomRepositoryInterface as InterfacesClassroomRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClassroomRepository implements InterfacesClassroomRepositoryInterface
{

    public function index()
    {
        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages.My_Classes.My_Classes',compact('Grades','My_Classes'));
    }

    public function store($request)
    {
        $List_Classes = $request->List_Classes;
        try {
            foreach ($List_Classes as $List_Class) {
                $My_Classes = new Classroom();
                $My_Classes->name_class = ['en' => $List_Class['name_class_en'], 'ar' => $List_Class['name']];
                $My_Classes->grade_id = $List_Class['Grade_id'];
                $My_Classes->save();
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('Classroom.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

        $Classrooms = Classroom::findOrFail($request->id);

        $Classrooms->update([

            $Classrooms->name_class = ['ar' => $request->Name, 'en' => $request->Name_en],
            $Classrooms->grade_id = $request->Grade_id,
        ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Classroom.index');
    }

    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}

    public function destroy($request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Classroom.index');
    }


    public function delete_all($request)
    {
        $delete_all_id = explode(",",$request->delete_all_id);
        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }

    public function Filter_Classes( $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('grade_id','=',$request->grade_id)->get();
        return view('pages.My_Classes.My_Classes',compact('Grades'))->withDetails($Search);

    }
}