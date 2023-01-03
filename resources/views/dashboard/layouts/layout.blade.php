<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
 <!DOCTYPE html>
 <html lang="IR-fa" dir="rtl">
 
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
     <meta name="author" content="Lukasz Holeczek">
     <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
     <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
     <title>Shaban Blog</title>
     <!-- Icons -->
     <link href="{{ asset('adminassets/css/font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('adminassets/css/simple-line-icons.css') }}" rel="stylesheet">
     <!-- Main styles for this application -->
     <link href="{{ asset('adminassets/dest/style.css') }}" rel="stylesheet">
 </head>
 <!-- BODY options, add following classes to body to change options
         1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
         2. 'sidebar-nav'		  - Navigation on the left
             2.1. 'sidebar-off-canvas'	- Off-Canvas
                 2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
                 2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
         3. 'fixed-nav'			  - Fixed navigation
         4. 'navbar-fixed'		  - Fixed navbar
     -->
 
 <body class="navbar-fixed sidebar-nav fixed-nav">
     <header class="navbar">
         <div class="container-fluid">
             <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
             <a class="navbar-brand" href="#"></a>
             <ul class="nav navbar-nav hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                 </li>
 
                 <!--<li class="nav-item p-x-1">
                     <a class="nav-link" href="#">داشبورد</a>
                 </li>
                 <li class="nav-item p-x-1">
                     <a class="nav-link" href="#">Users</a>
                 </li>
                 <li class="nav-item p-x-1">
                     <a class="nav-link" href="#">Settings</a>
                 </li>-->
             </ul>
             <ul class="nav navbar-nav pull-left hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-list"></i></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                         <img src="{{ asset('adminassets/img/avatars/5.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
                         <span class="hidden-md-down">مدیر</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                         <div class="dropdown-header text-xs-center">
                             <strong>تنظیمات</strong>
                         </div>
                         <a class="dropdown-item" href="#"><i class="fa fa-user"></i> پروفایل</a>
                         <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> تنظیمات</a>
                         <!--<a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>-->
                         <div class="divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"> <i class="fa fa-lock"></i>
                                {{ __('words.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                 </li>
 
             </ul>
         </div>
     </header>
     <div class="sidebar">
         <nav class="sidebar-nav">
             <ul class="nav">
                 <li class="nav-item">
                     <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> {{ __('words.dashboard') }} <span class="tag tag-info">جدید</span></a>
                 </li>
 
                 <li class="nav-title">
                    مدیریت کاربران
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-user-follow"></i> ثبت کاربر</a>
                     <a class="nav-link" href="#"><i class="icon-people"></i> لیست کاربران</a>
                     <a class="nav-link" href="#"><i class="icon-user-following"></i> دسترسی کاربران</a>
                 </li>
 
                 <li class="nav-title">
                    مدیریت فایل ها
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-docs"></i> لیست فایل ها</a>
                 </li>
 
                 <li class="nav-title">
                    گزارش گیری
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.settings') }}"><i class="icon-people"></i>{{ __('words.settings') }}</a>
                     <a class="nav-link" href="#"><i class="icon-docs"></i>  فایل ها</a>
                 </li>
                 <!--<li class="nav-item nav-dropdown">
                     <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> ثبت کاربر جدید</a>
                     <ul class="nav-dropdown-items">
                         <li class="nav-item">
                             <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i> لیست کاربران</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-social-buttons.html"><i class="icon-puzzle"></i> Social Buttons</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-cards.html"><i class="icon-puzzle"></i> Cards</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-forms.html"><i class="icon-puzzle"></i> Forms</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-switches.html"><i class="icon-puzzle"></i> Switches</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="components-tables.html"><i class="icon-puzzle"></i> Tables</a>
                         </li>
                     </ul>
                 </li>-->
 
                 <!--<li class="nav-item nav-dropdown">
                     <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
                     <ul class="nav-dropdown-items">
                         <li class="nav-item">
                             <a class="nav-link" href="icons-font-awesome.html"><i class="icon-star"></i> Font Awesome</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="icons-simple-line-icons.html"><i class="icon-star"></i> Simple Line Icons</a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets <span class="tag tag-info">NEW</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Charts</a>
                 </li>-->
                 <!--<li class="divider"></li>
                 <li class="nav-title">
                     Extras
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                     <ul class="nav-dropdown-items">
                         <li class="nav-item">
                             <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Register</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error 404</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error 500</a>
                         </li>
                     </ul>
                 </li>-->
 
             </ul>
         </nav>
     </div>
     <!-- Main content -->
     <main class="main">
        @yield('body')
     </main>
 
    @include('dashboard.layouts.sidebar')
 
     <footer class="footer">
         <span class="text-left">
             <a href="http://coreui.io">CoreUI</a> &copy; 2016 creativeLabs.
         </span>
         <span class="pull-right">
             Powered by <a href="http://coreui.io">CoreUI</a>
         </span>
     </footer>
     <!-- Bootstrap and necessary plugins -->
     <script src="{{ asset('adminassets/js/libs/jquery.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/tether.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/bootstrap.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/pace.min.js') }}"></script>
 
     <!-- Plugins and scripts required by all views -->
     <script src="{{ asset('adminassets/js/libs/Chart.min.js') }}"></script>
 
     <!-- CoreUI main scripts -->
 
     <script src="{{ asset('adminassets/js/app.js') }}"></script>
 
     <!-- Plugins and scripts required by this views -->
     <!-- Custom scripts required by this view -->
     <script src="{{ asset('adminassets/js/views/main.js') }}"></script>
 
     <!-- Grunt watch plugin -->
     <script src="//localhost:35729/livereload.js"></script>
 </body>
 
 </html>
 