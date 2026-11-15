<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
  Schema::create('appointments',function(Blueprint $table){
   $table->id();
   $table->string('name');
   $table->string('phone');
   $table->string('email')->nullable();
   $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
   $table->foreignId('doctor_id')->nullable()->constrained()->nullOnDelete();
   $table->date('preferred_date');
   $table->text('message')->nullable();
   $table->string('status')->default('pending');
   $table->timestamps();
  });
 }
 public function down():void { Schema::dropIfExists('appointments'); }
};
