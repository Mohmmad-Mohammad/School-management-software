<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Models\Classroom;
use App\Models\Grade;
// use Grade\Grade as GradeGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades = Grade::all();
    return view('pages.Grades.grades',compact('Grades'));
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
  public function store(GradeRequest $request)
  {
    if (Grade::where('name->ar', $request->Name)->orWhere('name->en',$request->Name)->exists()){
        return redirect()->back()->withErrors(['error'=> trans('Grades_trans.exists')]);
    }
    try {
    $grade = new Grade();
    $grade ->name = ['en'=>$request->Name_en,'ar'=>$request->Name];
    $grade->notes = $request->Notes;
    $grade->save();
    toastr()->success(trans('messages.success'));
    return redirect()->back();
    }catch (\Exception $ex){
        return redirect()->back()->withErrors(['error'=>$ex->getMessage()]);
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
  public function update(GradeRequest $request)
  {

       try {
       $request->validated();
       $Grades = Grade::findOrFail($request->id);
       $Grades->update([
         $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
         $Grades->notes = $request->notes,
       ]);
       toastr()->success(trans('messages.Update'));
       return redirect()->route('grades.index');
   }
   catch (\Exception $e) {
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
    try {
        $MyClass_id = Classroom::where('grade_id',$request->id)->pluck('grade_id');
        if($MyClass_id->count() == 0){

            Grade::findOrFail($request->id)->delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('grades.index');
        }  else {
            toastr()->error(trans('Grades_trans.delete_Grade_Error'));
            return redirect()->route('Grades.index');
        }
    }catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    }

}

}

?>