<?php
namespace App\Http\Controllers;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;
class ContactController extends Controller {
 public function store(Request $request){
  $data=$request->validate([
   'name'=>['required','string','max:100'],
   'email'=>['required','email','max:255'],
   'message'=>['required','string','max:800'],
  ]);
  ContactInquiry::create($data);
  return redirect('/contact')->with('success','Your inquiry was received. The hospital will review it.');
 }
}
