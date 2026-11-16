<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class HealthPackage extends Model {
    protected $fillable=['name','slug','short_description','description','thumbnail','tests','price','offer_price','is_published','sort_order'];
    protected function casts(): array {return ['tests'=>'array','price'=>'decimal:2','offer_price'=>'decimal:2','is_published'=>'boolean','sort_order'=>'integer'];}
    public function scopePublished(Builder $query): Builder {return $query->where('is_published',true);}
}
