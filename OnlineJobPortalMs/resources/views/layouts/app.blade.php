<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
 <script>
          $( function() {
            $( "#datepicker" ).datepicker({dateFormat:"yy-mm-dd"}).val();
            
          });
 </script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-uppercase" style="font-size:1.4rem; font-family: Arial, Helvetica, sans-serif; font-weight:bold; color:#FF0064" href="{{ url('/') }}"><img src="{{asset('logo/jobsvizor.svg')}}" width="60px" height="60px">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-primary" href="{{ route('employer.register') }}">{{ __('For Employers') }}</a>
                                </li>
                            @endif
                        @else
                        @if(Auth::user()->user_type=='employer')
                                     <li class="nav-item">
                                        <a class="nav-link" href="{{ route('job.create') }}">{{ __('Post a Job') }}</a>
                                  </li>
                                  @endif

                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <!-- If user that login is company it goes to company table to get d company name else it goes to seeker table for user's Name -->
                                @if(Auth::user()->user_type=='employer')
                                     {{Auth::user()->company->cname}}
                                @endif
                                
                                @if(Auth::user()->user_type=='seeker')    
                                    {{Auth::user()->name}}
                                      @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <!--Dynamically controlling the dropdown per users that logged in -->
                                @if(Auth::user()->user_type=='employer')
                                <a class="dropdown-item" href="{{ route('company.view') }}">{{ __('Company Profile') }}  
                                
                                <a class="dropdown-item" href="{{ route('myjob') }}">
                                {{ __('My Job') }}  
                                    </a>

                                    <a class="dropdown-item" href="{{ route('applicants') }}">
                                {{ __('Applicants') }}  
                                    </a>

                                @else
                                   
                                    <a class="dropdown-item" href="{{ route('home')}}">
                                     {{ __('My Dashboard') }}    
                                    </a>  

                                    <a class="dropdown-item" href="user/profile">
                                     {{ __('My Profile') }}    
                                    </a>  
                                @endif


                                     <!--Logout-->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
