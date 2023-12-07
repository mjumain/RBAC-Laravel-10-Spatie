@push('css')
@endpush
@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">informasi akun</h5>
                </div>
                <div class="ms-auto">

                </div>
            </div>
        </div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">ganti password</h5>
                </div>
                <div class="ms-auto">

                </div>
            </div>
        </div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(".alert-dismissible").fadeTo(2000, 500).slideUp(700, function() {
                $(".alert-dismissible").alert('close');
            });
        });
    </script>
@endpush
