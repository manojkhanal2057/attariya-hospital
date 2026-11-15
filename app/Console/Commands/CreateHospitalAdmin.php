<?php
namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class CreateHospitalAdmin extends Command {
 protected $signature='hospital:create-admin';
 protected $description='Interactively create the initial hospital administrator.';
 public function handle():int {
  $name=$this->ask('Administrator name');
  $email=$this->ask('Administrator email address');
  $password=$this->secret('Strong password (minimum 12 characters)');
  $data=['name'=>$name,'email'=>$email,'password'=>$password];
  $validator=Validator::make($data,[
   'name'=>'required|string|max:100','email'=>'required|email|unique:users,email',
   'password'=>'required|string|min:12'
  ]);
  if($validator->fails()) {$this->error($validator->errors()->first());return self::FAILURE;}
  User::create(['name'=>$name,'email'=>$email,'password'=>Hash::make($password),'is_admin'=>true]);
  $this->info('Admin created. Sign in at /admin.');return self::SUCCESS;
 }
}
