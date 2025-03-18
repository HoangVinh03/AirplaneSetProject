<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromeCode extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'code',
        'discount_type',
        'discount',
        'valid_untill',
        'is_used',
    ];
    public function transactions(){
        return $this->hasOne(Transactions::class);
    }
}