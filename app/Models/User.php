<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class User extends Model
{
<<<<<<< HEAD
    use HasFactory,Uuids;
=======
    use HasFactory, Uuids;
>>>>>>> 53e321236fc74c56065ada152d5ac9d4c3f8193b

    protected $table = 'users';
    protected $primaryKey = "id";
    protected $fillable = [
        'name'
    ];
    public function administration()
    {
        return $this->hasOne( Administration::class,'user_id');
    }
    public function DAU(){
        return $this->hasOne(DAU::class,'user_id','id');
    }
    public function NRU(){
        return $this->hasOne(NRU::class,'id');
    }
}
