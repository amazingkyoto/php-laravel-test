<main class="py-4">
    <div id="sidenav" class="text-secondary">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        @php
        use App\Menu;
        $menus = Menu::all();
        @endphp

        @auth
        @foreach($menus as $menu)
        <a href="{{ url('/' . $menu->url) }}">
            <i class="{{ $menu->iconClass }}"></i>
            <span>{{ $menu->title }}</span>
        </a>
        @endforeach
        @endauth
    </div>

    <div id="main">
        @auth
        <span class="rounded" style="font-size:30px;cursor:pointer; background-color: rgba(17, 17, 17, 0.1);"
            onclick="openNav()">&#9776;</span>
        @endauth
