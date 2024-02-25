<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $city = "";
        $country = "";
        return view('weather', compact('city','country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Weather $weather)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Weather $weather)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weather $weather)
    {
        //
    }

    public function showResults(Request $request)
    {
        $apiKey = env('OPENWEATHERMAP_API_KEY');

        $cityName = $request->city;

        if(strcasecmp($cityName, "Manila") == 0 || strcasecmp($cityName, "Philippines") == 0)
        {
            $city = $request->city;
            $lat = "14.599512";
            $lon = "120.984222";
        }
        else
        {
            $city = "";
        }



        $url = 'api.openweathermap.org/data/2.5/forecast?lat=' . $lat . '&lon=' . $lon .  '&appid=244e295b6af97c1d9b0d33d0db57e5e4';
        $response = Http::get($url);

        if($response->successful())
        {
            $data = $response->json();

            $city = $data['city']['name'];
            $country = $data['city']['country'];

            return view('weather',compact('city','country'));
        }
        else
        {
            
            return redirect()->route('home')->with('error', $response);
        }
        
       
        
       
       

    }

    public function __invoke($city)
    {
        
    }
}
