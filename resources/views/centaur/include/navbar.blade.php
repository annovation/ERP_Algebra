<nav class="navbar {{ $class }}">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Centaur</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Algebra ERP</a></li>
                @if (Sentinel::check() && Sentinel::hasAccess('offices.view'))
                <li class="{{ Request::is('offices*') ? 'active' : '' }}"><a href="{{ route('offices.index') }}">Offices</a></li>
                @endif
                @if (Sentinel::check() && Sentinel::hasAccess('employees.view'))
                <li class="{{ Request::is('employees*') ? 'active' : '' }}"><a href="{{ route('employees.index') }}">Employees</a></li>
                @endif
                @if (Sentinel::check() && Sentinel::inRole('administrator'))
                    <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Roles</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Sentinel::check())
                    <li><p class="navbar-text">{{ Sentinel::getUser()->email }}</p></li>
                    <li><a href="{{ route('auth.logout') }}">Log Out</a></li>
                @else
                    <li><a href="{{ route('auth.login.form') }}">Login</a></li>
                    <li><a href="{{ route('auth.register.form') }}">Register</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
