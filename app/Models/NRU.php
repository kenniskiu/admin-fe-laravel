<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class NRU extends Model
{
    use HasFactory,Uuids;

    protected $table = 'new_registered_users';
    protected $primaryKey = "id";
}
