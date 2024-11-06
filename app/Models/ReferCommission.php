<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferCommission extends Model
{
    use HasFactory;
    protected $fillable = ['parent', 'parent_of_parent','grand_parent'];
}
