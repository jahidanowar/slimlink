<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'destination', 'short', 'hits', 'user_id', 'last_location'
    ];





    //Accessor
    public function getLastLocationAttribute($value)
    {
        $result_array = json_decode($value, true);
        unset($result_array['driver']);
        unset($result_array['countryCode']);
        unset($result_array['regionCode']);
        unset($result_array['isoCode']);
        unset($result_array['metroCode']);

        return $result_array;
    }
}
