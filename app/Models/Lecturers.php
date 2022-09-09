<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    use HasFactory;

    protected $table = 'lecturers';
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'is_lecturer',
        'is_mentor'
    ];
}
