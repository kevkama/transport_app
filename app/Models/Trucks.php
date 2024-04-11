<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trucks extends Model
{
    use HasFactory;
    protected $fillable =[
        "truck_name",
        "driver_id"
    ];
}
