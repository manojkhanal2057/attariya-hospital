<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Service extends Model {
 protected $fillable = ["name", "slug", "description", "body", "icon", "image", "is_featured", "is_active", "sort_order"];
 protected $casts = ['is_featured'=>'boolean', 'is_active'=>'boolean'];

}
