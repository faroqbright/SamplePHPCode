<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('dashboard') }}" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="fas fa-chalkboard"></i></div>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('app-users') }}" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="fas fa-users"></i></div>
                        <span>App Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dailyRakes') }}" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="fas fa-align-justify"></i></div>
                        <span>Daily Rake</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('userRakes') }}" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="fas fa-address-book"></i></div>
                        <span>Submitted Rakes</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ url('tables') }}" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="fas fa-box"></i></div>
                        <span>Settings</span>
                    </a>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="fas fa-box"></i></div>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('levels.index') }}">Levels</a></li>
                        <li><a href="{{ route('points.index') }}">Points</a></li>
                        <li><a href="{{ route('about.form') }}">About</a></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
