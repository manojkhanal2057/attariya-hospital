<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Department extends Model {
 protected $fillable = ["name", "slug", "description", "icon", "image", "is_active", "sort_order"];
 protected $casts = ['is_active'=>'boolean'];
 public function doctors(): \Illuminate\Database\Eloquent\Relations\HasMany { return $this->hasMany(Doctor::class); }
}
