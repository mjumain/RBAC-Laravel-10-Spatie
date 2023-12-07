@push('css')
@endpush
@section('title', 'PENGATURAN ROLE')
@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">manajemen role</h5>
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
                            <th scope="col">No.</th>
                            <th scope="col">Nama Role</th>
                            <th scope="col">Guard</th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>
                                    <div class="d-flex order-actions align-items-center">
                                        <a href="{{ route('role.edit', $role->id) }}" class="ms-1"><i
                                                class='bx bxs-edit'></i></a>
                                        <a href="javascript:;" class="ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-form-delete-{{ $role->id }}"><i
                                                class='bx bxs-trash'></i></a>
                                    </div>
                                    @include('role.delete')
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
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush
