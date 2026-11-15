<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Doctor,Department,Service,SiteSetting,NewsPost};
class DatabaseSeeder extends Seeder {
 public function run():void {
  foreach ([['name'=>'Cardiology','slug'=>'cardiology','description'=>'Heart health consultation and cardiac care.','icon'=>'heart-pulse','is_active'=>true,'sort_order'=>0],['name'=>'Orthopaedics','slug'=>'orthopaedics','description'=>'Bone, joint and musculoskeletal care.','icon'=>'bone','is_active'=>true,'sort_order'=>1],['name'=>'Paediatrics','slug'=>'paediatrics','description'=>'Healthcare for infants, children and adolescents.','icon'=>'baby','is_active'=>true,'sort_order'=>2],['name'=>'Gynaecology','slug'=>'gynaecology','description'=>'Women’s health and gynaecology consultation.','icon'=>'flower-2','is_active'=>true,'sort_order'=>3],['name'=>'General Surgery','slug'=>'surgery','description'=>'Evaluation and care for surgical conditions.','icon'=>'activity','is_active'=>true,'sort_order'=>4],['name'=>'General Medicine','slug'=>'medicine','description'=>'Consultation for a wide range of health concerns.','icon'=>'stethoscope','is_active'=>true,'sort_order'=>5],['name'=>'Radiology','slug'=>'diagnostics','description'=>'Medical imaging and diagnostic support.','icon'=>'scan','is_active'=>true,'sort_order'=>6],['name'=>'Anaesthesiology','slug'=>'anaesthesia','description'=>'Anaesthesia-related clinical care and support.','icon'=>'shield-plus','is_active'=>true,'sort_order'=>7]] as $row) {
    Department::firstOrCreate(['slug'=>$row['slug']],$row);
  }
  foreach ([['name'=>'Dr. Anand Pathak','slug'=>'dr-anand-pathak','specialty'=>'General & Laparoscopic Surgeon','is_active'=>true,'dept_slug'=>'surgery'],['name'=>'Dr. Biplave Karki','slug'=>'dr-biplave-karki','specialty'=>'Cardiology','is_active'=>true,'dept_slug'=>'cardiology'],['name'=>'Dr. Hari Sapkota','slug'=>'dr-hari-sapkota','specialty'=>'Radiology','is_active'=>true,'dept_slug'=>'diagnostics'],['name'=>'Dr. Manoj Bhatta','slug'=>'dr-manoj-bhatta','specialty'=>'Orthopaedics','is_active'=>true,'dept_slug'=>'orthopaedics'],['name'=>'Dr. Milan KC','slug'=>'dr-milan-kc','specialty'=>'Paediatrics','is_active'=>true,'dept_slug'=>'paediatrics'],['name'=>'Dr. Paras Pant','slug'=>'dr-paras-pant','specialty'=>'General Surgeon','is_active'=>true,'dept_slug'=>null],['name'=>'Dr. Parssh Mani Bhatta','slug'=>'dr-parssh-mani-bhatta','specialty'=>'','is_active'=>true,'dept_slug'=>null],['name'=>'Dr. Rosy Joshi','slug'=>'dr-rosy-joshi','specialty'=>'Anaesthesiology','is_active'=>true,'dept_slug'=>'anaesthesia'],['name'=>'Dr. Shiba Bam','slug'=>'dr-shiba-bam','specialty'=>'','is_active'=>true,'dept_slug'=>null]] as $row) {
    $deptSlug=$row['dept_slug'];unset($row['dept_slug']);
    if($deptSlug) $row['department_id']=Department::where('slug',$deptSlug)->value('id');
    Doctor::firstOrCreate(['slug'=>$row['slug']],$row);
  }
  foreach ([['name'=>'Emergency Care','slug'=>'emergency','description'=>'Emergency-related hospital support. Please telephone the hospital directly for immediate assistance.','icon'=>'ambulance','is_active'=>true,'is_featured'=>false,'sort_order'=>1],['name'=>'OPD Consultation','slug'=>'opd','description'=>'Outpatient consultation for a variety of medical concerns.','icon'=>'clipboard-list','is_active'=>true,'is_featured'=>false,'sort_order'=>2],['name'=>'Laboratory','slug'=>'laboratory','description'=>'Laboratory testing and clinical diagnostic support.','icon'=>'flask-conical','is_active'=>true,'is_featured'=>false,'sort_order'=>3],['name'=>'Cath Lab','slug'=>'cath-lab','description'=>'Cardiac catheterization service reported by news outlets; confirm current access and timing.','icon'=>'heart-pulse','is_active'=>true,'is_featured'=>true,'sort_order'=>0],['name'=>'Medical Imaging','slug'=>'imaging','description'=>'Diagnostic imaging and radiology-related consultation.','icon'=>'scan','is_active'=>true,'is_featured'=>false,'sort_order'=>5],['name'=>'General Surgery','slug'=>'surgery','description'=>'Surgical consultation, evaluation and care.','icon'=>'activity','is_active'=>true,'is_featured'=>false,'sort_order'=>6]] as $row) {
    Service::firstOrCreate(['slug'=>$row['slug']],$row);
  }
  foreach ([
    'hospital_name'=>'Attariya Hospital Pvt. Ltd.',
    'hero_line_1'=>'Your health.',
    'hero_line_2'=>'Your wellbeing.',
    'hero_line_3'=>'Our priority.',
    'hero_description'=>'Thoughtful care, medical expertise and helpful patient information — closer to home in Attariya, Kailali.',
    'phone'=>'091-590547',
    'email'=>'attariyahospital@gmail.com',
    'address'=>'Mahendranagar Road, Attariya, Kailali',
    'facebook'=>'https://www.facebook.com/attariyahospital'
  ] as $key=>$value) SiteSetting::firstOrCreate(['key'=>$key],['value'=>$value]);
 }
}
