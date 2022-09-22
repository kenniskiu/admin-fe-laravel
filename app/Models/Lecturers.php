<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    use HasFactory,  Uuids;

    protected $table = 'lecturers';
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'is_lecturer',
        'is_mentor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
