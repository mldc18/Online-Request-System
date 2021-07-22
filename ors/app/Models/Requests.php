<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $fillable = [
        'student_id',
        'request_status',
        'request_date',
        'due_date',
        'request_id',
        'attachments',
    ];
}

