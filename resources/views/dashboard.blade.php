<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Pag-Asa</title>

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="{{ asset('designs/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ asset('designs/style.css') }}">


</head>


<body>

    <div class="site-content">
        <div class="site-header">
            <div class="container">
                <a href="index.html" class="branding">
                    <img src="{{ asset('designs/images/logo.png') }}" alt="" class="logo">
                    <div class="logo-type">
                        <h1 class="site-title">Weather App</h1>
                        <small class="site-description">TEST APP</small>
                    </div>
                </a>

                <!-- Default snippet for navigation -->
                <div class="main-navigation">
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <!-- <li class="menu-item current-menu-item"><a href="index.html">Home</a></li> -->
                        <!--<li class="menu-item"><a href="">Contact</a></li>-->
                        <li class="menu-item"><a href="{{ route('logout') }}">Logout</a></li>

                    </ul> <!-- .menu -->
                </div> <!-- .main-navigation -->

                <div class="mobile-navigation"></div>

            </div>
        </div> <!-- .site-header -->

        <div class="hero" data-bg-image="{{ asset('designs/images/banner.png') }}">
            <div class="container">
                <form action="{{ route('search') }}" method="post" class="find-location">
                    @csrf
                    <!--  <input type="text" placeholder="Find your location...">-->
                    <input type="text" placeholder="Find your country..." name="country" />
                    <input type="submit" value="Find">
                </form>

            </div>
        </div>
        <div class="forecast-table">
            <div class="container">
                <div class="forecast-container">
                    <div class="today forecast">
                        <div class="forecast-header">
                            <div class="day">{{ now()->format('l') }}</div>
                            <div class="date">{{ now()->format('d M') }}</div>
                        </div> <!-- .forecast-header -->
                        <div class="forecast-content">
                            <div class="location">{{ $country }}</div>
                            <div class="degree">
                                <div class="num">{{ $temp }}<sup>o</sup>C</div>
                                <div class="forecast-icon">
                                    <img src="{{ $iconUrl }}" alt="" width=90>
                                </div>
                            </div>
                            <span><img src="{{ asset('designs/images/icon-umberella.png') }}"
                                    alt="">{{ $weatherDescription }}</span>
                            <span><img src="{{ asset('designs/images/icon-wind.png') }}"
                                    alt="">{{ $wind }} Km/h</span>
                        </div>
                    </div>
                    <div class="forecast">
                        <div class="forecast-header">
                            <div class="day">{{ date('l', strtotime('+1 day')) }}</div>
                        </div> <!-- .forecast-header -->
                        <div class="forecast-content">
                            <div class="forecast-icon">
                                <img src="{{ $icon0Url }}" alt="" width=48>
                            </div>
                            <div class="degree">{{ $day0Temp }}<sup>o</sup>C</div>

                        </div>
                    </div>
                    <div class="forecast">
                        <div class="forecast-header">
                            <div class="day">{{ date('l', strtotime('+2 day')) }}</div>
                        </div> <!-- .forecast-header -->
                        <div class="forecast-content">
                            <div class="forecast-icon">
                                <img src="{{ $icon1Url }}" alt="" width=48>
                            </div>
                            <div class="degree">{{ $day1Temp }}<sup>o</sup>C</div>

                        </div>
                    </div>
                    <div class="forecast">
                        <div class="forecast-header">
                            <div class="day">{{ date('l', strtotime('+3 day')) }}</div>
                        </div> <!-- .forecast-header -->
                        <div class="forecast-content">
                            <div class="forecast-icon">
                                <img src="{{ $icon2Url }}" alt="" width=48>
                            </div>
                            <div class="degree">{{ $day2Temp }}<sup>o</sup>C</div>

                        </div>
                    </div>
                    <div class="forecast">
                        <div class="forecast-header">
                            <div class="day">{{ date('l', strtotime('+4 day')) }}</div>
                        </div> <!-- .forecast-header -->
                        <div class="forecast-content">
                            <div class="forecast-icon">
                                <img src="{{ $icon3Url }}" alt="" width=48>
                            </div>
                            <div class="degree">{{ $day3Temp }}<sup>o</sup>C</div>

                        </div>
                    </div>
                    <!--  <div class="forecast">
                        <div class="forecast-header">
                            <div class="day">Saturday</div>
                        </div>
                        <div class="forecast-content">
                            <div class="forecast-icon">
                                <img src="images/icons/icon-13.svg" alt="" width=48>
                            </div>
                            <div class="degree">23<sup>o</sup>C</div>
                            <small>18<sup>o</sup></small>
                        </div>
                    </div>
                    <div class="forecast">
                        <div class="forecast-header">
                            <div class="day">Sunday</div>
                        </div>
                        <div class="forecast-content">
                            <div class="forecast-icon">
                                <img src="images/icons/icon-14.svg" alt="" width=48>
                            </div>
                            <div class="degree">23<sup>o</sup>C</div>
                            <small>18<sup>o</sup></small>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <main class="main-content">




        <div class="fullwidth-block">
            <div class="container">
                <div class="row">



                </div>
            </div>
        </div>
    </main> <!-- .main-content -->

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form action="#" class="subscribe-form">
                        <p class="colophon">Copyright 2024. All rights reserved</p>
                    </form>
                </div>

            </div>

        </div>
    </footer> <!-- .site-footer -->
    </div>

    <script src="{{ asset('designs/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('designs/js/plugins.js') }}"></script>
    <script src="{{ asset('designs/js/app.js') }}"></script>

</body>

</html>
