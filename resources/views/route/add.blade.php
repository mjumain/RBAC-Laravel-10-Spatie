@extends('layouts.app')
@section('title', 'User Management')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">tambah route</h5>
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
                    <label class="form-label">Route Name</label>
                    <select class="form-control single-select-2" name="route" data-placeholder="Choose one thing">
                        @foreach ($facadesRoutes as $facadesRoute)
                            @if (!blank($facadesRoute->getName()))
                                <option value="{{ $facadesRoute->getName() }}">{{ $facadesRoute->getName() }}
                                </option>
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
                    <label class="form-label">Permission Name</label>
                    <select class="form-control single-select-2" name="permission_name" data-placeholder="Choose one thing">
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
                        <input class="form-check-input code-switcher" type="checkbox" id="tables-small-showcode"
                            name="status" value="1">
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
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            "use strict";
            $('.single-select-2').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
            });
        });
    </script>
@endpush
