@extends('layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">tambah menu</h5>
                </div>
                <div class="ms-auto">
                    @include('tombol.back')

                </div>
            </div>
        </div>
        <form action="{{ route('menu.item.update', [$menu, $menuItem->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Menu Name" name="name" value="{{ $menuItem->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="text" class="form-control" id="icon" placeholder="Remix Icon (eg: ri-home-line)"
                        name="icon" value="{{ $menuItem->icon }}">
                    @error('icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="route" class="form-label">Route</label>
                    <select class="form-control" id="route" name="route" data-choices data-choices-removeItem>
                        @foreach ($routes as $route)
                            @if (!blank($route->getName()))
                                <option @selected($menuItem->route == $route->getName()) value="{{ $route->getName() }}">
                                    {{ $route->getName() }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('route')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="permission_name" class="form-label">Permission Name</label>
                    <select class="form-control" id="permission_name" name="permission_name" data-choices
                        data-choices-removeItem>
                        @foreach ($permissions as $permission)
                            <option @selected($menuItem->permission_name == $permission->name) value="{{ $permission->name }}">
                                {{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('permission_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="status" class="form-label">Status</label>
                        <input class="form-check-input code-switcher" type="checkbox" id="tables-small-showcode"
                            name="status" value="1" @checked($menuItem->status)>
                    </div>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                @include('tombol.save')
            </div>
        </form>
    </div>
@endsection
