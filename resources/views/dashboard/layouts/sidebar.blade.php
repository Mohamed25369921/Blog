<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-speedometer"></i> {{ __('words.dashboard') }}
                </a>
            </li>




            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('words.categories') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.categories.index') }}"><i class="icon-people"></i>
                            {{ __('words.categories') }}</a>
                        @can('viewAny', $setting)
                            <a class="nav-link" href="{{ route('dashboard.categories.create') }}"><i
                                    class="icon-user-follow"></i>{{ __('words.add category') }}</a>
                        @endcan
                    </li>
                </ul>
            </li>


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('words.posts') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.posts.index') }}"><i class="icon-people"></i>
                            {{ __('words.posts') }}</a>
                        <a class="nav-link" href="{{ route('dashboard.posts.create') }}"><i
                                class="icon-user-follow"></i>{{ __('words.add post') }}</a>
                    </li>
                </ul>
            </li>
            @can('viewAny', $setting)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                        {{ __('words.users') }}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i class="icon-people"></i>
                                {{ __('words.users') }}</a>
                            <a class="nav-link" href="{{ route('dashboard.users.create') }}"><i
                                    class="icon-user-follow"></i>{{ __('words.add user') }}</a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.settings') }}"><i class="icon-people"></i>
                        {{ trans('words.settings') }}</a>
                </li>
            @endcan
        </ul>
    </nav>
</div>
