@extends('layouts.app')
@section('title', 'PENGATURAN MENU')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">manajemen menu</h5>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('menu.item.create', $menu->id) }}" class="btn btn-outline-primary"><i
                            class='bx bx-plus me-0'></i></a>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table id="table" class="table align-middle mb-0" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Route</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="col-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menuItems as $menuItem)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $menuItem->name }}</td>
                                    <td>{{ $menuItem->icon }}</td>
                                    <td>{{ $menuItem->route }}</td>
                                    <td>{{ $menuItem->permission_name }}</td>
                                    {{-- <td>{{ $menu->id }}</td> --}}
                                    <td>
                                        @if ($menuItem->status)
                                            <div
                                                class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle align-middle me-1'></i>show
                                            </div>
                                        @else
                                            <div
                                                class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle align-middle me-1'></i>hide
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions align-items-center">
                                            <a href="{{ route('menu.item.edit', [$menu->id, $menuItem->id]) }}"
                                                class="ms-1"><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-1" data-bs-toggle="modal"
                                                data-bs-target="#modal-form-delete-{{ $menuItem->id }}"><i
                                                    class='bx bxs-trash'></i></a>
                                        </div>
                                        @include('menu.item.delete')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $menuItems->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush
