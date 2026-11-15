<?php
namespace App\Http\Controllers;
use App\Models\{Appointment,Department,Doctor};
use Illuminate\Http\Request;
class AppointmentController extends Controller {
 public function store(Request $request){
  $data=$request->validate([
   'name'=>['required','string','min:2','max:100'],
   'phone'=>['required','string','regex:/^[0-9+\-\s]{7,20}$/'],
   'email'=>['nullable','email','max:255'],
   'department'=>['required','string','max:100'],
   'doctor'=>['nullable','string','max:120'],
   'date'=>['required','date','after_or_equal:today'],
   'message'=>['nullable','string','max:300'],
   'consent'=>['accepted'],
  ]);
  $department=Department::where('name',$data['department'])->where('is_active',true)->first();
  if (!$department) return back()->withErrors(['department'=>'Please select a valid department.'])->withInput();
  $doctor=filled($data['doctor']??null)?Doctor::where('name',$data['doctor'])->where('is_active',true)->first():null;
  if (filled($data['doctor']??null) && !$doctor) return back()->withErrors(['doctor'=>'Please select a valid doctor.'])->withInput();
  Appointment::create([
    'name'=>$data['name'],'phone'=>$data['phone'],'email'=>$data['email']??null,
    'department_id'=>$department->id,'doctor_id'=>$doctor?->id,
    'preferred_date'=>$data['date'],'message'=>$data['message']??null,'status'=>'pending',
  ]);
  return redirect('/appointment')->with('success','Your appointment request was received. It is not confirmed until the hospital contacts you.');
 }
}
