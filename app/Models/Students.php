<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory, Uuids;

    protected $table = 'students';
    protected $primaryKey = "id";
    protected $fillable = [
        'study_program',
        'semester',
    ];
}
