<?php

namespace App\Models;

use App\Traits\UsesUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, UsesUuidTrait;

    protected $fillable = [
        'uuid',
        'name',
        'phone_number',
        'email',
        'country',
        'country_code'
    ];
}
