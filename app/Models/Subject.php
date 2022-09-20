<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Uuids;


class Subject extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Uuids;
    protected $table = 'subjects';
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'number_of_sessions',
        'level',
        'lecturer',
        'degree',
        'credits',
        'description'
    ];
}
