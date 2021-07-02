<?php

namespace App\Http\Controllers;



use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\WeatherStation;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WeatherStation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Created_At' => 'required',
            'WIND_Speed' => 'required',
            'WIND_Orientation' => 'required',
            'Temperature' => 'required',
            'Pressure' => 'required',
            'Approx_Altitude' => 'required',
            'Humidity' => 'required',
            'Irradiation' => 'required',
            'Voltage' => 'required'
        ]);

        return WeatherStation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return WeatherStation::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Search for dateTime
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function searchByDate($dateBegin, $dateEnd)
    {
        $format1 = 'Y-m-d';
        $format2 = 'H:i:s';
        $date1 = Carbon::parse($dateBegin)->format($format1);
        $time1 = Carbon::parse($dateBegin)->format($format2);
        $date2 = Carbon::parse($dateEnd)->format($format1);
        $time2 = Carbon::parse($dateEnd)->format($format2);
        
        return WeatherStation::whereDate('Created_At' , '<=' , $date1)->get(); 
           
    }

     /**
     * Search for dateTime
     *
     * @param  double  $Pressure
     * @return \Illuminate\Http\Response
     */
    public function searchByElement($attribut)
    {
        return WeatherStation::select($attribut, 'Created_At')->groupby()->get();
           
    }
}
