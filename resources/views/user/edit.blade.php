@extends('layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">tambah pengguna</h5>
                </div>
                <div class="ms-auto">
                    @include('tombol.back')

                </div>
            </div>
        </div>
        <form action="{{ route($datas['url_update'], $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Nama Lengkap" name="name" value="{{ $user->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        placeholder="Alamat Email" name="username" value="{{ $user->username }}">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Alamat Email" name="email" value="{{ $user->email }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role Pengguna</label>
                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role"
                        data-choices data-choices-removeItem>
                        @foreach ($roles as $role)
                            <option @selected($user->hasRole($role->name)) value="{{ $role->name }}">{{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="verified" class="form-label">Verifikasi Pengguna</label>
                        <input class="form-check-input @error('verified') is-invalid @enderror" type="checkbox"
                            id="tables-small-showcode" name="verified" value="1" @checked(!blank($user->email_verified_at))>
                    </div>
                    @error('verified')
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
