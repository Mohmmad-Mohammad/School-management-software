<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $My_Classes = Classroom::all();
    $Grades = Grade::all();
    return view('pages.My_Classes.My_Classes',compact('Grades','My_Classes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ClassroomRequest $request)
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

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
    public function update(Request $request)
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
/**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
    public function destroy(Request $request)
    {

        $Classrooms = Classroom::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Classroom.index');

    }


    public function delete_all(Request $request){
        $delete_all_id = explode(",",$request->delete_all_id);
        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }

    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('grade_id','=',$request->grade_id)->get();
        return view('pages.My_Classes.My_Classes',compact('Grades'))->withDetails($Search);

    }
}

?>