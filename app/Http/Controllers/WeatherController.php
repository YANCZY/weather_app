<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

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
        $country = '';
        $temp = '-';
        $humidity = '';
        $wind = '-';
        $weatherDescription = '-';
        $iconUrl = '';
        $day0Temp = '-';
        $day1Temp = '-';
        $day2Temp = '-';
        $day3Temp = '-';
        $icon0Url = '';
        $icon1Url = '';
        $icon2Url = '';
        $icon3Url = '';
        $weather0Description = '-';
        $weather1Description = '-';
        $weather2Description = '-';
        $weather3Description = '-';

        return view('dashboard', compact(
            'country', 'temp', 'humidity', 'wind', 'weatherDescription', 'iconUrl', 
            'day0Temp', 'day1Temp', 'day2Temp', 'day3Temp', 'icon0Url', 'icon1Url', 
            'icon2Url', 'icon3Url', 'weather0Description', 'weather1Description', 
            'weather2Description', 'weather3Description'
        ));
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
        
        $openWeatherApiKey = env('OPENWEATHER_API_KEY');
        $googleMapsApiKey = env('GOOGLE_MAP_LOCATION_KEY');
        $countryName = $request->country;
        $lat = $request->filled('cityLat') ? $request->cityLat : null;
        $lon = $request->filled('cityLng') ? $request->cityLng : null;
        
        if (is_null($lat) || is_null($lon)) {
            $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($countryName) . '&key=' . $googleMapsApiKey;
            $response = file_get_contents($url);
            $data = json_decode($response, true);
        
            if ($data['status'] != 'OK' || !isset($data['results'][0]['geometry']['location']['lat']) || !isset($data['results'][0]['geometry']['location']['lng'])) {
                $notification = [
                    'message'    => 'Country has not been added yet.',
                    'alert-type' => 'info'
                ];
                return redirect()->route('home')->with($notification);
            }
        
            $lat = $data['results'][0]['geometry']['location']['lat'];
            $lon = $data['results'][0]['geometry']['location']['lng'];
        }
        
        $url = 'http://api.openweathermap.org/data/2.5/forecast?lat=' . $lat . '&lon=' . $lon . '&appid=' . $openWeatherApiKey;
        $response = Http::get($url);
        
        if ($response->successful()) {
            $data = $response->json();
        
            // Extracting weather information
        
            // Constructing view data
            $viewData = [
                'country' => ucfirst($countryName),
                'temp' => $this->convertTemperature($data['list'][0]['main']['temp']),
                'humidity' => $data['list'][0]['main']['humidity'],
                'wind' => round($data['list'][0]['wind']['speed'], 2),
                'weatherDescription' => $data['list'][0]['weather'][0]['description'],
                'iconUrl' => 'http://openweathermap.org/img/w/' . $data['list'][0]['weather'][0]['icon'] . '.png',
                'day0Temp' => $this->convertTemperature($data['list'][6]['main']['temp']),
                'icon0Url' => 'http://openweathermap.org/img/w/' . $data['list'][6]['weather'][0]['icon'] . '.png',
                'day1Temp' => $this->convertTemperature($data['list'][13]['main']['temp']),
                'icon1Url' => 'http://openweathermap.org/img/w/' . $data['list'][13]['weather'][0]['icon'] . '.png',
                'day2Temp' => $this->convertTemperature($data['list'][21]['main']['temp']),
                'icon2Url' => 'http://openweathermap.org/img/w/' . $data['list'][21]['weather'][0]['icon'] . '.png',
                'day3Temp' => $this->convertTemperature($data['list'][29]['main']['temp']),
                'icon3Url' => 'http://openweathermap.org/img/w/' . $data['list'][29]['weather'][0]['icon'] . '.png',
                'weather0Description' => $data['list'][6]['weather'][0]['main'],
                'weather1Description' => $data['list'][13]['weather'][0]['main'],
                'weather2Description' => $data['list'][21]['weather'][0]['main'],
                'weather3Description' => $data['list'][29]['weather'][0]['main'],
            ];
        
            return view('dashboard', $viewData);
        } else {
            $notification = [
                'message'    => 'Country has not been added yet.',
                'alert-type' => 'info'
            ];
            return redirect()->route('home')->with($notification);
        }

    }


    public function __invoke($city)
    {
        
    }
}
