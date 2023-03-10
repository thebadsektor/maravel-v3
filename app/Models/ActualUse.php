<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'actual_use',
        'category',
        'description'
    ];
}
