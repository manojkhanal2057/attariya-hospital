<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Doctor extends Model {
 protected $fillable = ["name", "slug", "specialty", "qualification", "bio", "image", "department_id", "is_active", "sort_order"];
 protected $casts = ['is_active'=>'boolean'];
 public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo { return $this->belongsTo(Department::class); }
}
