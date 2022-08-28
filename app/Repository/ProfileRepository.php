<?php


namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\Teacher;
use App\Repository\Interfaces\ProfileRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileRepository implements ProfileRepositoryInterface
{
    use AttachFilesTrait;

    public function index()
    {
        $information = Teacher::findorFail(auth()->user()->id);
        return view('pages.Teachers.dashboard.profile', compact('information'));
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try{
        $information = Teacher::findorFail($id);
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
            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }
    }
}