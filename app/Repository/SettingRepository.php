<?php


namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\Setting;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Repository\Interfaces\SettingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingRepository implements SettingRepositoryInterface
{
    use AttachFilesTrait;
    public function index()
    {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('pages.setting.index', $setting);
    }

    public function update($request)
    {
        try{
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key=> $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }

//            $key = array_keys($info);
//            $value = array_values($info);
//            for($i =0; $i<count($info);$i++){
//                Setting::where('key', $key[$i])->update(['value' => $value[$i]]);
//            }

            if($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key', 'logo')->update(['value' => $logo_name]);
                $this->uploadFile($request,'logo','logo');
            }

            toastr()->success(trans('messages.Update'));
            return back();
        }
        catch (\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

}