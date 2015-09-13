<li class="dropdown user">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!--<img alt="" src="{{ asset('melon/img/avatar1_small.jpg') }}" />-->
        <i class="icon-male"></i>
        <span class="username">{{ Auth::user()->full_name }}</span>
        <i class="icon-caret-down small"></i>
    </a>
    <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> Mi Perfil</a></li>
        {{--<li><a href="pages_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>--}}
        {{--<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>--}}
        <li class="divider"></li>
        <li><a href="{{ route('logout') }}"><i class="icon-key"></i> Log Out</a></li>
    </ul>
</li>