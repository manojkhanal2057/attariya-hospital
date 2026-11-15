<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
  Schema::create('doctors',function(Blueprint $table){
   $table->id();
   $table->string('name');
   $table->string('slug')->unique();
   $table->string('specialty')->nullable();
   $table->string('qualification')->nullable();
   $table->text('bio')->nullable();
   $table->string('image')->nullable();
   $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
   $table->boolean('is_active')->default(true);
   $table->integer('sort_order')->default(0);
   $table->timestamps();
  });
 }
 public function down():void { Schema::dropIfExists('doctors'); }
};
