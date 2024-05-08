<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bday',
        'age',
        'website',
        'mobile_number',
        'Location',
        'email',
        'freelance',
        'img',
    ];
}
