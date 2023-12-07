@push('css')
@endpush
@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">manajemen permission</h5>
                </div>
                <div class="ms-auto">
                    @include('tombol.add')
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#generate_permission"><i class='bx bx-sync me-0'></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="generate_permission" tabindex="-1" aria-labelledby="generate_permission"
                        aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="generate_permission">Generate Permission</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('permission.generate') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1">@</span>
                                            <input type="text" class="form-control" name="name" placeholder="Perm-ssion Name" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="permission[]" value="index" type="checkbox" id="index">
                                            <label class="form-check-label" for="index">Index</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="permission[]" value="create" type="checkbox" id="create">
                                            <label class="form-check-label" for="create">Create</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="permission[]" value="store" type="checkbox" id="store">
                                            <label class="form-check-label" for="store">Store</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="permission[]" value="edit" type="checkbox" id="edit">
                                            <label class="form-check-label" for="edit">Edit</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="permission[]" value="update" type="checkbox" id="update">
                                            <label class="form-check-label" for="update">Update</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="permission[]" value="show" type="checkbox" id="show">
                                            <label class="form-check-label" for="show">Show</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="permission[]" value="destroy" type="checkbox" id="delete">
                                            <label class="form-check-label" for="delete">Destroy</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        @include('tombol.save')
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0 datatable" style="width: 100%">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Guard</th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>
                                    <div class="d-flex order-actions align-items-center">
                                        <a href="{{ route('permission.edit', $permission->id) }}" class="ms-1"><i
                                                class='bx bxs-edit'></i></a>
                                        <a href="javascript:;" class="ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-form-delete-{{ $permission->id }}"><i
                                                class='bx bxs-trash'></i></a>
                                    </div>
                                    @include('permission.delete')
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
