<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $timestamps=false;


  

    public function account_models(){
        return $this->belongsTo(AccountModel::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    

}