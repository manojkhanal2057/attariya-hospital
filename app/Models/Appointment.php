<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Appointment extends Model {
 protected $fillable = ["name", "phone", "email", "department_id", "doctor_id", "preferred_date", "message", "status"];
 protected $casts = ['preferred_date'=>'date'];
 public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo { return $this->belongsTo(Doctor::class); }
 public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo { return $this->belongsTo(Department::class); }
}
