<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <!-- App Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- Toaster  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <div class="wrapper">
            <div class="img_section">
                <div class="default_info">
                    <h2 class="default_day">{{ now()->format('l') }}</h2>
                    <span class="default_date">{{ now()->format('M-d-Y') }}</span>
                    <div class="icons">
                        <img src="{{ $iconUrl }}" alt="" />
                        <h2 class="weather_temp">{{ $temp }}</h2>
                        <h3 class="cloudtxt">{{ $weatherDescription }}</h3>
                    </div>
                </div>
            </div>
            <div class="content_section">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <input type="text" placeholder="Enter a city" name="city" />
                    <button type="submit">Search</button>
                </form>
                <div class="day_info">
                    <div class="content">
                        <p class="title">City</p>
                        <span class="value">{{ $city }}</span>
                    </div>
                    <div class="content">
                        <p class="title">Country</p>
                        <span class="value">{{ $country }}</span>
                    </div>
                    <div class="content">
                        <p class="title">TEMP</p>
                        <span class="value">{{ $temp }}°C</span>
                    </div>
                    <div class="content">
                        <p class="title">HUMIDITY</p>
                        <span span class="value">{{ $humidity }}%</span>
                    </div>
                    <div class="content">
                        <p class="title">WIND SPEED</p>
                        <span class="value">{{ $wind }}Km/h</span>
                    </div>
                </div>
                <div class="list_content">
                    <ul>
                        <li>
                            <img src="{{ $iconUrl }}" />
                            <span>{{ date('l', strtotime('+1 day')) }}</span>
                            <span class="day_temp">{{ $day0Temp }}°C</span>
                        </li>
                        <li>
                            <img src="{{ $iconUrl }}" />
                            <span>{{ date('l', strtotime('+2 day')) }}</span>
                            <span class="day_temp">{{ $day1Temp }}°C</span>
                        </li>
                        <li>
                            <img src="{{ $iconUrl }}" />
                            <span>{{ date('l', strtotime('+3 day')) }}</span>
                            <span class="day_temp">{{ $day2Temp }}°C</span>
                        </li>
                        <li>
                            <img src="{{ $iconUrl }}" />
                            <span>{{ date('l', strtotime('+4 day')) }}</span>
                            <span class="day_temp">{{ $day3Temp }}°C</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
