<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheatherDay extends Model
{
    use HasFactory;

    protected $table = 'wheather_day_log';

    protected $fillable = [
        'city_id',
        'date',
    ];
}
