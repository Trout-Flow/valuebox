<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SellerPaymentDetails extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bank_id', 'account_title',
        'iban_number', 'bank_check','seller_id'
    ];


    public function bank_id()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }

    public function seller_id()
    {
        return $this->hasOne(Seller::class, 'id', 'seller_id');
    }
}
