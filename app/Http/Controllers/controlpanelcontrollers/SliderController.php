<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use App\Slider;
use App\Traits\ImgaeUpload;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    use ImgaeUpload;
    public function index()
    {
        $sliders=Slider::all();

        return view('base_layout.slider..index',['sliders'=>$sliders]);
    }

    public function create(){
        return view('base_layout.slider.create');
    }
    public function store(Request $request){
       $validation= $request->validate($this->rules(),$this->messages());
       if($validation){
           $slider=new Slider();
           if ($request->has('photo')) {
               $request->photo=$this->UserImageUpload($request['photo'],'sliders');
           }
           $slider->title=$request->title;
           $slider->subTitle=$request->subTitle;
           $slider->image=$request->photo;
           $slider->rank=$request->rank;
           if($request->active==='on'){
               $request->active=1;
           }else{
               $request->active=0;
           }
           $slider->active=$request->active;
           $slider->save();
           return redirect()->back()->with('success', 'تم الإضافة بنجاح!');
       }
        return redirect()->back()->with('error', 'هناك خطأ في الإضافة!');
    }
    public function edit($id)
    {
        try {
            $slider= Slider::findOrFail($id);
            return view('base_layout.slider.edit', compact('slider'));
        } catch (ModelNotFoundException $modelNotFoundException) {
            return redirect()->route('slider.index')
                ->with('error', 'شريحة العرض غير موجودة');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $slider = Slider::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('slider.index')
                ->with('error', 'شريحة العرض غير موجودة');
        }
        $request->validate($this->rules(), $this->messages());
        if ($request->hasFile('photo')) {
            if (File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            $slider->image = $this->UserImageUpload($request['photo'],'sliders');
        }
        $slider->title=$request->title;
        $slider->subTitle=$request->subTitle;
        $slider->rank=$request->rank;
        if($request->active==='on'){
            $request->active=1;
        }else{
            $request->active=0;
        }
        $slider->active=$request->active;
        $slider->update();
        return redirect()->route('slider.index')
            ->with('success','تم التعديل بنجاح');
    }
    public function destroy($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $slider->delete(); //hard delete
            return redirect()->back()->with('success', ' تم الحذف بنجاح');
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with('error', 'شريحة العرض غير موجودة');
        }

    }
    private function rules(){
        return[
            'title'=>'required',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif',

        ];
    }
    private function messages(){
        return[
            'title.required'=>'يجب إدخال العنوان الرئيسي',
            'photo.required'=>'الصورة مطلوبة',
            'photo.image'=>'الملف المسموح رفعه صورة ',
            'photo.mimes'=>'نوع الصورة يجب أن يكون jpeg,png,jpg,gif  ',
        ];
    }
}
