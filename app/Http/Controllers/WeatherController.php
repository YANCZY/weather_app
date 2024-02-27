<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{

    private function convertTemperature($temperature)
    {
        return round(($temperature - 273.15), 0);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $country = "";
        $temp = '-';
        $humidity = "";
        $wind = '-';
        $weatherDescription = '-';
        $iconUrl = "";
        $day0Temp = '-';
        $day1Temp = '-';
        $day2Temp = '-';
        $day3Temp = '-';
        $icon0Url = "";
        $icon1Url = "";
        $icon2Url = "";
        $icon3Url = "";
        $weather0Description = '-';
        $weather1Description = '-';
        $weather2Description = '-';
        $weather3Description = '-';
        
        return view('dashboard', compact('country','temp','humidity','wind','weatherDescription','iconUrl', 'day0Temp', 'day1Temp', 'day2Temp', 'day3Temp', 'icon0Url', 'icon1Url', 'icon2Url', 'icon3Url','weather0Description','weather1Description','weather2Description','weather3Description'));
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
    public function destroy(Request $request)
    {
        //
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showResults(Request $request)
    {
        $apiKey = env('OPENWEATHERMAP_API_KEY');

        $countryName = $request->country;
        $lat = "";
        $lon = "";

        if(strcasecmp($countryName, "Philippines") == 0)
        {
            $country = $request->country;
            $lat = "12.879721";
            $lon = "121.774017";
        }
        elseif(strcasecmp($countryName, "Us") == 0 || strcasecmp($countryName, "America") == 0)
        {
            $country = $request->country;
            $lat = "37.090240";
            $lon = "-95.712891";
        }
        elseif(strcasecmp($countryName, "UK") == 0 || strcasecmp($countryName, "United Kingdom") == 0)
        {
            $country = $request->country;
            $lat = "55.378052";
            $lon = "-3.435973";
        }
       


        $url = 'api.openweathermap.org/data/2.5/forecast?lat=' . $lat . '&lon=' . $lon .  '&appid=244e295b6af97c1d9b0d33d0db57e5e4';
        $response = Http::get($url);

        if($response->successful())
        {
            $data = $response->json();

            $country = ucfirst($country);
            $temp = $this->convertTemperature($data['list'][0]['main']['temp']);
            $humidity = $data['list'][0]['main']['humidity'];
            $wind = round($data['list'][0]['wind']['speed'], 2);
            $weatherDescription = $data['list'][0]['weather'][0]['description'];
            $icon = $data['list'][0]['weather'][0]['icon'];
            $iconUrl = 'http://openweathermap.org/img/w/' . $icon . '.png';
            

            $days = [6, 13, 21, 29]; // Indices for the next 4 days
            for($i = 0; $i < 4; $i++)
            {
                ${"day{$i}Temp"} = $this->convertTemperature($data['list'][$days[$i]]['main']['temp']);
                ${"icon{$i}"} = $data['list'][$days[$i]]['weather'][0]['icon'];
                ${"icon{$i}Url"} = 'http://openweathermap.org/img/w/' . ${"icon{$i}"} . '.png';
                ${"weather{$i}Description"} = $data['list'][$i]['weather'][0]['main'];
            }
            
            return view('dashboard',compact('country','temp','humidity','wind','weatherDescription','iconUrl', 'day0Temp', 'day1Temp', 'day2Temp', 'day3Temp', 'icon0Url', 'icon1Url', 'icon2Url', 'icon3Url','weather0Description','weather1Description','weather2Description','weather3Description'));
        }
        else
        {
           
            
            return redirect()->route('home');
        }
        
       
        
       
       

    }

    public function __invoke($city)
    {
        
    }
}
