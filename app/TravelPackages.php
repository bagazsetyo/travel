<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TravelPackages extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','slug','location','about',
        'feature_evet','language','food',
        'departure_date','duration','type',
        'price'
    ];
    protected $hidden = [
        
    ];
   
    public function galleries()
    {
        return $this->hasMany(Gallery::class,'travel_packages_id');
    }
}
