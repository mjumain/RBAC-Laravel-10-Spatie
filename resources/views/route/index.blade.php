@extends('layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">manajemen route</h5>
                </div>
                <div class="ms-auto">
                    @include('tombol.add')

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0 datatable" style="width: 100%">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Route</th>
                            <th scope="col">Permission</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routes as $route)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $route->route }}</td>
                                <td>
                                    <div
                                        class="badge rounded-pill text-primary bg-light-primary p-2 text-uppercase px-3">
                                        <i
                                            class='bx bxs-circle align-middle me-1'></i>{{ $route->permission_name }}
                                    </div>
                                </td>
                                <td>
                                    @if ($route->status)
                                        <div
                                            class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle align-middle me-1'></i>Enable
                                        </div>
                                    @else
                                        <div
                                            class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle align-middle me-1'></i>Disable
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex order-actions align-items-center">
                                        <a href="{{ route('route.edit', $route->id) }}" class="ms-1"><i
                                                class='bx bxs-edit'></i></a>
                                        <a href="javascript:;" class="ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-form-delete-{{ $route->id }}"><i
                                                class='bx bxs-trash'></i></a>
                                    </div>
                                    @include('route.delete')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
