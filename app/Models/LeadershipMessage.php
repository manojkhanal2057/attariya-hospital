<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class LeadershipMessage extends Model {
    protected $fillable = ['name','position','photo','message','is_published','sort_order'];
    protected function casts(): array { return ['is_published'=>'boolean','sort_order'=>'integer']; }
    public function scopePublished(Builder $query): Builder { return $query->where('is_published',true); }
}
