<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('leadership_messages', function(Blueprint $table) {
        $table->id(); $table->string('name'); $table->string('position'); $table->string('photo')->nullable();
        $table->text('message'); $table->boolean('is_published')->default(false);
        $table->unsignedInteger('sort_order')->default(0); $table->timestamps();
    }); }
    public function down(): void { Schema::dropIfExists('leadership_messages'); }
};
