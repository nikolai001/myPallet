<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TypeEnum;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $casts = [
        'type' => TypeEnum::class
    ];
}