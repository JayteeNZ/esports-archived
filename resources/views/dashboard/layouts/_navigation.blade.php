<aside id="navigation">
    <div class="navigation__header">
        <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
    </div>

    <div class="navigation__toggles">
        <a href="" class="active" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__messages">
            <i class="zmdi zmdi-email"></i>
        </a>
        <a href="" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__updates">
            <i class="zmdi zmdi-notifications"></i>
        </a>
        <a href=""  data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__tasks">
            <i class="zmdi zmdi-playlist-plus"></i>
        </a>
    </div>

    <div class="navigation__menu c-overflow">
        <ul>
            <li class="navigation__active"><a href="{{ route('dashboard') }}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
            <li><a href="{{ route('home') }}"><i class="zmdi zmdi-http"></i>Parallel</a></li>
            <li class="navigation__sub">
                <a href="" data-mae-action="submenu-toggle"><i class="zmdi zmdi-globe-lock"></i>Content Creation</a>
                <ul>
                    <li><a href="tables.html">Sponsors</a></li>
                    <li><a href="data-tables.html">Meta Data</a></li>
                    <li><a href="data-tables.html">Site Settings</a></li>
                </ul>
            </li>
            <li class="navigation__sub">
                <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-device-hub"></i>Tournaments</a>
                <ul>
                    <li><a href="/dashboard/tournaments">View all</a></li>
                    <li><a href="/dashboard/tournaments/create">Create</a></li>
                    <li><a href="/dashboard/tournaments?filter=scheduled">Scheduled</a></li>
                </ul>
            </li>
            <li class="navigation__sub">
                <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-gamepad"></i> Game Settings</a>
                <ul>
                    <li><a href="/dashboard/games">View all</a></li>
                    <li><a href="/dashboard/games/create">Publish New Game</a></li>
                </ul>
            </li>
            <li class="navigation__sub">
                <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-border-color"></i> Rulesets</a>
                <ul>
                    <li><a href="/dashboard/rulesets">View all</a></li>
                    <li><a href="/dashboard/rulesets/create">New Ruleset</a></li>
                </ul>
            </li>
            <li class="navigation__sub">
                <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-globe"></i>Global</a>
                <ul>
                    <li><a href="/dashboard/platforms">Platforms</a></li>
                </ul>
            </li>
            <li class="navigation__sub">
                <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-account-add"></i>Authorization</a>
                <ul>
                    <li><a href="/dashboard/authorization/roles">Roles</a></li>
                    <li><a href="/dashboard/authorization/permissions">Permissions</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>