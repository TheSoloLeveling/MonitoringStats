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
        $d1 = Carbon::parse($dateBegin);
        $d2 = Carbon::parse($dateEnd);

        return WeatherStation::select()->whereBetween('Created_At', [$d1, $d2])->orderBy('Created_At', 'DESC')->get();
           
    }

     /**
     * Search for dateTime
     *
     * @param  double  $Pressure
     * @return \Illuminate\Http\Response
     */
    public function searchByElement($attribut)
    {
        if ($attribut == 'all'){
            return WeatherStation::select()->orderBy('Created_At', 'DESC')->get();
        }
        else{
            return WeatherStation::select($attribut, 'Created_At')->orderBy('Created_At', 'DESC')->get();
        }
        
           
    }

    public function searchByValue($attribut, $value1, $value2)
    {
        $v1 = (Double) $value1;
        $v2 = (Double) $value2;

        if(empty($v1) || empty($v2))
        {
            return 'Donnes errones';
        }
        if($v2 < $v1){
            return false;
        }
        else{
            return WeatherStation::select()->where($attribut, '>=', $v1)->where($attribut, '<=', $v2)
            ->orderBy('Created_At', 'DESC')->get();
        } 
           
    }

    public function searchAll($attribut, $dateBegin, $dateEnd, $value1, $value2)
    {
        $d1 = Carbon::parse($dateBegin);
        $d2 = Carbon::parse($dateEnd);

        $v1 = (Double) $value1;
        $v2 = (Double) $value2;

        if(empty($v1) || empty($v2)){
            return WeatherStation::select()->whereBetween('Created_At', [$d1, $d2])
            ->orderBy('Created_At', 'DESC')->get();
        }
        
        return WeatherStation::select()->whereBetween('Created_At', [$d1, $d2])->where($attribut, '>=', $v1)->where($attribut, '<=', $v2)
            ->orderBy('Created_At', 'DESC')->get();
           
    }
}
