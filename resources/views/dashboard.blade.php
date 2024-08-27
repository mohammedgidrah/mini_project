<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">
        
        <title>laravel</title>
        <link href="{{ url('css/font-face.css') }}" rel="stylesheet" media="all">
        <link href="{{ url('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ url('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ url('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
        
        <link href="{{ url('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
        
        <link href="{{ url('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ url('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
        <link href="{{ url('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
        <link href="{{ url('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ url('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
        <link href="{{ url('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ url('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
        
        <link rel="stylesheet" href="{{ url('css/theme.css') }}">
        
        <link href="{{ url('css/theme.css') }}" rel="stylesheet" media="all">
        
        
    </head>
    
    
    <body class="animsition">
        <x-app-layout>
            {{-- <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot> --}}
            
            
            @yield('content')      
            <aside class="menu-sidebar d-none d-lg-block">

            <div   class="menu-sidebar__content js-scrollbar1">
                <nav style="background-color: #1f2937;width: 300px; height: 100vh"   class="navbar-sidebar">
                    <ul style="color: white;padding: 20px; margin: 20px; display: flex;justify-content: space-around; flex-direction: column; gap: 20px" class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ route('product.index') }}">
                                <i class="fas fa-tachometer-alt"></i>All product</a>
                                
                                
                        </li>
                        <li>
                            <a href="{{ route('product.create') }}">
                                <i class="fas fa-chart-bar"></i>create product</a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}">
                                <i class="fas fa-chart-bar"></i>all category</a>
                        </li>
                        <li>
                            <a href="{{ route('category.create') }}">
                                <i class="fas fa-chart-bar"></i>create category</a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}">
                                <i class="fas fa-chart-bar"></i> all user</a>
                        </li>
                        <li>
                            <a href="{{ route('user.create') }}">
                                <i class="fas fa-chart-bar"></i> create user</a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}">
                                <i class="fas fa-chart-bar"></i> all contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    
    
    
        </div>
        </div>
        </div>
        </div>
    
        <script src="{{ url('vendor/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ url('vendor/bootstrap-4.1/popper.min.js') }}"></script>
        <script src="{{ url('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
        <script src="{{ url('vendor/slick/slick.min.js') }}"></script>
        <script src="{{ url('vendor/wow/wow.min.js') }}"></script>
        <script src="{{ url('vendor/animsition/animsition.min.js') }}"></script>
        <script src="{{ url('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <script src="{{ url('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ url('vendor/counter-up/jquery.counterup.min.js') }}"></script>
        <script src="{{ url('vendor/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ url('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ url('vendor/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ url('vendor/select2/select2.min.js') }}"></script>
    
    
        <script src="{{ url('vendor/select2/select2.min.js') }}"></script>
        <script src="{{ url('js/main.js') }} "></script>
    
    
    </body>
    
    </html>
    

</x-app-layout>
