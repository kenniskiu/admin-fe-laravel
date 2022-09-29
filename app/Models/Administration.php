<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuids;

class Administration extends Model
{
    use HasFactory, Uuids;

    protected $table = 'Administrations';
    protected $primaryKey = "id";
    protected $fillable = [
        'is_approved',
        'rejected_files'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
