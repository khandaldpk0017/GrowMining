<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'amount', 'utr_number', 'qr_code_id','ss', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
