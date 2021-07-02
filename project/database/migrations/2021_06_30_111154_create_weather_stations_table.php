<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_stations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('Created_At');
            $table->double('WIND_Speed', 1, 2);
            $table->String('WIND_Orientation');
            $table->double('Temperature', 2, 2);
            $table->double('Pressure', 4, 2);
            $table->double('Approx_Altitude', 3, 2);
            $table->double('Humidity', 3, 2);
            $table->double('Irradiation', 4, 2);
            $table->double('Voltage', 1, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_stations');
    }
}
