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
        <form action="{{ route($datas['url_add']) }}" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Nama Menu" name="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="permission_name" class="form-label">Permission Menu</label>
                    <select class="form-control @error('permission_name') is-invalid @enderror" id="permission_name"
                        name="permission_name" data-choices data-choices-removeItem>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
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
                        <input class="form-check-input @error('status') is-invalid @enderror code-switcher" type="checkbox"
                            id="tables-small-showcode" name="status" value="1">
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
