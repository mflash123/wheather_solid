<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheatherHour extends Model
{
    use HasFactory;

    protected $table = 'wheather_hour_log';

    protected $fillable = [
        'day_id',
        'time',
        'forecast'
    ];
}
