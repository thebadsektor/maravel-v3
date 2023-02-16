<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_fixed',
        'value',
        'description'
    ];
}
