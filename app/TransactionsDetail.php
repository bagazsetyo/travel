<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TransactionsDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_id','username','nationality','is_visa',
        'doe_passport',
    ];
    protected $hidden = [
        
    ];
   
    public function transaction_detail()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
}
