    @foreach (json_decode(GetData::MenuGroup()) as $key => $menu)
        @can($menu->permission_name)
            <li class="menu-label">{{ $menu->name }}</li>
            @foreach ($menu->items as $item)
                @can($item->permission_name)
                    <li>
                        <a href="{{ route($item->route) }}">
                            <div class="parent-icon"><i class='bx bx-{{ $item->icon }}'></i>
                            </div>
                            <div class="menu-title">{{ $item->name }}</div>
                        </a>
                    </li>
                @endcan
            @endforeach
        @endcan
    @endforeach
