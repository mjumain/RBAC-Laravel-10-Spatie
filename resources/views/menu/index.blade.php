@extends('layouts.app')
@push('css')
@endpush
@section('title', 'Menu Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">manajemen menu</h5>
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
                            <th>No.</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th class="align-items-center">Status</th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menuGroups as $menuGroup)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $menuGroup->name }}</td>
                                <td>{{ $menuGroup->permission_name }}</td>
                                <td>
                                    @if ($menuGroup->status)
                                        <div
                                            class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle align-middle me-1'></i>show
                                        </div>
                                    @else
                                        <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle align-middle me-1'></i>hide
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex order-actions align-items-center">
                                        <a href="{{ route('menu.item.index', $menuGroup->id) }}" class=""><i
                                                class='bx bx-menu'></i></a>
                                        <a href="{{ route('menu.edit', $menuGroup->id) }}" class="ms-1"><i
                                                class='bx bxs-edit'></i></a>
                                        <a href="javascript:;" class="ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-form-delete-{{ $menuGroup->id }}"><i
                                                class='bx bxs-trash'></i></a>
                                    </div>
                                    @include('menu.delete')
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
