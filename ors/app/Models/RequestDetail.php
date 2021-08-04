<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    use HasFactory;
    protected $table = 'requestdetails';
    protected $fillable = [
        'name',
        'details',
        'qualifications',
        'requirements',
    ];
}

