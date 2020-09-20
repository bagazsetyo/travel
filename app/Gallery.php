<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id','image'
    ];
    protected $hidden = [
        
    ];
    // public function travel_packages()
    // {
    //     return $this->belongsTo(TravelPackages::class, 'travel_packages_id','id');
    // }

    public function travel_packages()
    {
        return $this->belongsTo(TravelPackages::class,'travel_packages_id','id');
    }


    // menggunakan assesor dan mutator agar menyertakan url pada foto
    //get bawaan laravel, Photo fild di database, attribute bawaan laravel
    public function getPhotoAttribute($value)
    {
        //jika ingin menggunakan storage pada laravel harus menjalankan perintah
        //php artisan storage:link
        return url('storage/' . $value); 
    }
}
