<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class WeatherStation extends Eloquent
{

    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'weather_stations';
    
    protected $fillable = [
        'Created_At',
        'WIND_Speed',
        'WIND_Orientation',
        'Temperature',
        'Pressure',
        'Approx_Altitude',
        'Humidity',
        'Irradiation',
        'Voltage'
    ];
   
    protected $casts = [

        'Created_At' => 'datetime:Y-m-d H:i:s'

    ];



    
}
