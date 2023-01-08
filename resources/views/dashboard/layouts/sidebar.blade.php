<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> {{ __('words.dashboard') }}
                    <span class="tag tag-info">جدید</span></a>
            </li>

            <li class="nav-title">
            {{ __('words.users') }}
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i class="icon-user-follow"></i>{{ __('words.users') }}</a>
                <a class="nav-link" href="{{ route('dashboard.users.create') }}"><i class="icon-people"></i>{{ __('words.adduser') }}</a>
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
                <a class="nav-link" href="{{ route('dashboard.settings') }}"><i
                        class="icon-people"></i>{{ __('words.settings') }}</a>
                <a class="nav-link" href="#"><i class="icon-docs"></i> فایل ها</a>
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