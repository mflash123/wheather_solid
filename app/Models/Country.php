<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *  definition="Country",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="title",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="text",
 *      type="string"
 *  )
 * )
 */
class Country extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'iso2',
        'iso3'
    ];


    public function cities()
    {
        return $this->hasMany(City::class);
    }
    
}
