@push('css')
@endpush
@extends('layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">manajemen pengguna</h5>
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Verified</th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if (!blank($user->email_verified_at))
                                        <div
                                            class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle align-middle me-1'></i>Verified
                                        </div>
                                    @else
                                        <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle align-middle me-1'></i>Not Verified
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex order-actions align-items-center">
                                        <a href="{{ route('user.edit', $user->id) }}" class=""><i
                                                class='bx bxs-edit'></i></a>
                                        <a href="javascript:;" class="ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-form-delete-{{ $user->id }}">
                                            <i class='bx bxs-trash'></i></a>
                                    </div>
                                    {{-- @include('tombol.delete') --}}
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
