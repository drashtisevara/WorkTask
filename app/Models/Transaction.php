<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
      protected $fillable = [
        'accounts_id',
        'type',
        'category',
        'amount',
        'note',
    ];

   

    
    public function account(){
        return $this->belongsTo(Account::class);

        
    }
    public function account_models()
    {
        return $this->belongsTo(AccountModel::class);
    }

  

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($transactions) {
    //         $accounts->total_transaction->increment('total_transaction');
    //     });
    //     static::deleted(function ($transactions) {
    //         $accounts->total_transaction->decrement('total_transaction');
    //     });
    // }
}
    