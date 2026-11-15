<?php
namespace App\Http\Controllers;
use App\Models\{Department,Doctor,Service,Facility,GalleryImage,NewsPost,SiteSetting};
use Illuminate\Http\Request;
class HospitalController extends Controller {
 public function home() {
  return view('pages.index',[
   'title'=>'Home | Attariya Hospital',
   'doctors'=>Doctor::where('is_active',true)->orderBy('sort_order')->limit(4)->get(),
   'departments'=>Department::where('is_active',true)->orderBy('sort_order')->limit(6)->get(),
   'services'=>Service::where('is_active',true)->orderByDesc('is_featured')->orderBy('sort_order')->limit(4)->get(),
   'news'=>NewsPost::where('is_published',true)->where('published_at','<=',now())->latest('published_at')->limit(3)->get(),
  ]);
 }
 public function doctors(Request $request){
  $query=Doctor::where('is_active',true);
  if ($request->filled('q'))$query->where(fn($q)=>$q->where('name','like','%'.$request->q.'%')->orWhere('specialty','like','%'.$request->q.'%'));
  return view('pages.doctors',['doctors'=>$query->orderBy('sort_order')->get(),'title'=>'Doctors | Attariya Hospital']);
 }
 public function doctor(string $slug){
  return view('dynamic.doctor',['doctor'=>Doctor::where('slug',$slug)->where('is_active',true)->firstOrFail(),'title'=>'Doctor | Attariya Hospital']);
 }
 public function departments(){
  return view('pages.departments',['departments'=>Department::where('is_active',true)->orderBy('sort_order')->get(),'title'=>'Departments | Attariya Hospital']);
 }
 public function department(string $slug){
  $department=Department::where('slug',$slug)->where('is_active',true)->firstOrFail();
  return view('dynamic.department',['department'=>$department,'doctors'=>Doctor::where('department_id',$department->id)->where('is_active',true)->get(),'title'=>$department->name.' | Attariya Hospital']);
 }
 public function services(){
  return view('pages.services',['services'=>Service::where('is_active',true)->orderByDesc('is_featured')->orderBy('sort_order')->get(),'title'=>'Services | Attariya Hospital']);
 }
 public function service(string $slug){
  return view('dynamic.service',['service'=>Service::where('slug',$slug)->where('is_active',true)->firstOrFail(),'title'=>'Services | Attariya Hospital']);
 }
 public function facilities(){return view('dynamic.facilities',['facilities'=>Facility::where('is_active',true)->orderBy('sort_order')->get(),'title'=>'Facilities | Attariya Hospital']);}
 public function gallery(){
  return view('dynamic.gallery',['photos'=>GalleryImage::where('is_active',true)->orderBy('sort_order')->get(),'title'=>'Gallery | Attariya Hospital']);
 }
 public function news(){
  return view('dynamic.news',['posts'=>NewsPost::where('is_published',true)->where('published_at','<=',now())->latest('published_at')->paginate(9),'title'=>'News | Attariya Hospital']);
 }
 public function newsPost(string $slug){
  return view('dynamic.news-show',['post'=>NewsPost::where('slug',$slug)->where('is_published',true)->where('published_at','<=',now())->firstOrFail(),'title'=>'News | Attariya Hospital']);
 }
 public function page(string $name){
  abort_unless(in_array($name,['about','articles','contact','appointment','privacy']),404);
  return view('pages.'.$name,['title'=>ucfirst($name).' | Attariya Hospital']);
 }
}
