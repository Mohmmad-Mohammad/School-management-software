<?php

namespace App\Http\Livewire;

use App\Models\grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\Type_Blood;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;

    public $successMessage = '';

    public $catchError,$updateMode = false,$photos,$show_table = true,$parent_id;

    public $currentStep = 1,
// Father_INPUTS
        $email, $password,
        $name_father, $name_father_en,
        $national_ID_father, $passport_ID_father,
        $phone_father, $job_father, $job_father_en,
        $nationality_father_id, $blood_type_father_id,
        $address_father, $religion_father_id,
// Mother_INPUTS
        $name_mother, $name_mother_en,
        $national_ID_mother, $passport_ID_mother,
        $phone_mother, $job_mother, $job_mother_en,
        $nationality_mother_id, $blood_type_mother_id,
        $address_mother, $religion_mother_id ,$filename,$imageable_id ,$imageable_type,$name,$file,$images ;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'national_ID_father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_ID_father' => 'min:10|max:10',
            'phone_father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'national_ID_mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_ID_mother' => 'min:10|max:10',
            'phone_mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Type_Blood::all(),
            'Religions' => Religion::all(),
            'my_parents' => MyParent::all(),
        ]);
    }

    public function showformadd(){
        $this->show_table = false;
    }

    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:myparents,email,'.$this->id,
            'password' => 'required',
            'name_father' => 'required',
            'name_father_en' => 'required',
            'job_father' => 'required',
            'job_father_en' => 'required',
            'national_ID_father' => 'required|unique:myparents,national_ID_father,' . $this->id,
            'passport_ID_father' => 'required|unique:myparents,passport_ID_father,' . $this->id,
            'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_father_id' => 'required',
            'blood_type_father_id' => 'required',
            'religion_father_id' => 'required',
            'address_father' => 'required',
        ]);
        $this->currentStep = 2;
    }
//secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            'name_mother' => 'required',
            'name_mother_en' => 'required',
            'national_ID_mother' => 'required|unique:myparents,national_ID_mother,' . $this->id,
            'passport_ID_mother' => 'required|unique:myparents,passport_ID_mother,' . $this->id,
            'phone_mother' => 'required',
            'job_mother' => 'required',
            'job_mother_en' => 'required',
            'nationality_mother_id' => 'required',
            'blood_type_mother_id' => 'required',
            'religion_mother_id' => 'required',
            'address_mother' => 'required',
        ]);
        $this->currentStep = 3;
    }

    public function submitForm()
    {
        try {
            $My_Parent = new MyParent();
// Father_INPUTS
            $My_Parent->email = $this->email;
            $My_Parent->password = Hash::make($this->password);
            $My_Parent->name_father = ['en' => $this->name_father_en, 'ar' => $this->name_father];
            $My_Parent->national_ID_father = $this->national_ID_father;
            $My_Parent->passport_ID_father = $this->passport_ID_father;
            $My_Parent->phone_father = $this->phone_father;
            $My_Parent->job_father = ['en' => $this->job_father_en, 'ar' => $this->job_father];
            $My_Parent->nationality_father_id = $this->nationality_father_id;
            $My_Parent->blood_type_father_id = $this->blood_type_father_id;
            $My_Parent->religion_father_id = $this->religion_father_id;
            $My_Parent->address_father = $this->address_father;
// Mother_INPUTS
            $My_Parent->name_mother = ['en' => $this->name_mother_en, 'ar' => $this->name_mother];
            $My_Parent->national_ID_mother = $this->national_ID_mother;
            $My_Parent->passport_ID_mother = $this->passport_ID_mother;
            $My_Parent->phone_mother = $this->phone_mother;
            $My_Parent->job_mother = ['en' => $this->job_mother_en, 'ar' => $this->job_mother];
            $My_Parent->passport_ID_mother = $this->passport_ID_mother;
            $My_Parent->nationality_mother_id = $this->nationality_mother_id;
            $My_Parent->blood_type_mother_id = $this->blood_type_mother_id;
            $My_Parent->religion_mother_id = $this->religion_mother_id;
            $My_Parent->address_mother = $this->address_mother;
            $My_Parent->save();
            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    $photo->storeAs('attachments/My_Parent/'.$this->national_ID_father, $photo->getClientOriginalName(), $disk = 'upload_attachments');
                    Image::create([
                        'filename' => $photo->getClientOriginalName(),
                        'imageable_id' =>MyParent::latest()->first()->id,
                        'imageable_type' =>'App\Models\My_Parent',
                    ]);
                }
            }
            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;
        }catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

    }


    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = MyParent::where('id',$id)->first();
        $this->parent_id = $id;
        $this->email = $My_Parent->email;
        $this->password = $My_Parent->password;
        $this->name_father = $My_Parent->getTranslation('name_father', 'ar');
        $this->name_father_en = $My_Parent->getTranslation('name_father', 'en');
        $this->job_father = $My_Parent->getTranslation('job_father', 'ar');;
        $this->job_father_en = $My_Parent->getTranslation('job_father', 'en');
        $this->national_ID_father =$My_Parent->national_ID_father;
        $this->passport_ID_father = $My_Parent->passport_ID_father;
        $this->phone_father = $My_Parent->phone_father;
        $this->nationality_father_id = $My_Parent->nationality_father_id;
        $this->blood_type_father_id = $My_Parent->blood_type_father_id;
        $this->address_father =$My_Parent->address_father;
        $this->religion_father_id =$My_Parent->religion_father_id;
        $this->name_mother = $My_Parent->getTranslation('name_mother', 'ar');
        $this->name_mother_en = $My_Parent->getTranslation('name_mother', 'en');
        $this->job_mother = $My_Parent->getTranslation('job_mother', 'ar');;
        $this->job_mother_en = $My_Parent->getTranslation('job_mother', 'en');
        $this->national_ID_mother =$My_Parent->national_ID_mother;
        $this->passport_ID_mother = $My_Parent->passport_ID_mother;
        $this->phone_mother = $My_Parent->phone_mother;
        $this->nationality_mother_id = $My_Parent->nationality_mother_id;
        $this->blood_type_mother_id = $My_Parent->blood_type_mother_id;
        $this->address_mother =$My_Parent->address_mother;
        $this->religion_mother_id =$My_Parent->religion_mother_id;
    }

    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit()
    {
        if ($this->parent_id){
            $parent = MyParent::find($this->parent_id);
            $My_Parent = $parent ;
            $My_Parent->email = $this->email;
            $My_Parent->password = Hash::make($this->password);
            $My_Parent->name_father = ['en' => $this->name_father_en, 'ar' => $this->name_father];
            $My_Parent->national_ID_father = $this->national_ID_father;
            $My_Parent->passport_ID_father = $this->passport_ID_father;
            $My_Parent->phone_father = $this->phone_father;
            $My_Parent->job_father = ['en' => $this->job_father_en, 'ar' => $this->job_father];
            $My_Parent->nationality_father_id = $this->nationality_father_id;
            $My_Parent->blood_type_father_id = $this->blood_type_father_id;
            $My_Parent->religion_father_id = $this->religion_father_id;
            $My_Parent->address_father = $this->address_father;
// Mother_INPUTS
            $My_Parent->name_mother = ['en' => $this->name_mother_en, 'ar' => $this->name_mother];
            $My_Parent->national_ID_mother = $this->national_ID_mother;
            $My_Parent->passport_ID_mother = $this->passport_ID_mother;
            $My_Parent->phone_mother = $this->phone_mother;
            $My_Parent->job_mother = ['en' => $this->job_mother_en, 'ar' => $this->job_mother];
            $My_Parent->passport_ID_mother = $this->passport_ID_mother;
            $My_Parent->nationality_mother_id = $this->nationality_mother_id;
            $My_Parent->blood_type_mother_id = $this->blood_type_mother_id;
            $My_Parent->religion_mother_id = $this->religion_mother_id;
            $My_Parent->address_mother = $this->address_mother;
            $My_Parent->update();
        }
        if (!empty($this->photos)){
            foreach ($this->photos as $photo) {
                $photo->storeAs('attachments/My_Parent/'.$this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'upload_attachments');
                Image::create([
                    'filename' => $photo->getClientOriginalName(),
                    'imageable_id' =>$this->Parent_id,
                    'imageable_type' =>'App\Models\My_Parent',

                ]);
            }
        }

        toastr()->success(trans('messages.success'));
        return redirect()->to('/add_parent');
    }

    public function delete($id){
        MyParent::findOrFail($id)->delete();
        toastr()->success(trans('messages.success'));
        return redirect()->to('/add_parent');
    }

//clearForm
    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->name_father = '';
        $this->job_father = '';
        $this->job_father_en = '';
        $this->name_father_en = '';
        $this->national_ID_father ='';
        $this->passport_ID_father = '';
        $this->phone_father = '';
        $this->nationality_father_id = '';
        $this->blood_type_father_id = '';
        $this->address_father ='';
        $this->religion_father_id ='';
        $this->name_mother = '';
        $this->job_mother = '';
        $this->job_mother_en = '';
        $this->name_mother_en = '';
        $this->national_ID_mother ='';
        $this->passport_ID_mother = '';
        $this->phone_mother = '';
        $this->nationality_mother_id = '';
        $this->blood_type_mother_id = '';
        $this->address_mother ='';
        $this->religion_mother_id ='';

    }
//back
    public function back($step)
    {
        $this->currentStep = $step;
    }

}