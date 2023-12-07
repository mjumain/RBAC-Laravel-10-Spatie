<section>
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Berhasil</h6>
                    <div class="text-white">Akun berhasil diperbarui !</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <label class="form-label">Nama Lengkap</label>
        <div class="position-relative input-icon mb-3">
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
        </div>

        <label class="form-label">Alamat Email</label>
        <div class="position-relative input-icon mb-3">
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-mail-send'></i></span>
        </div>
        @include('tombol.save')
    </form>
</section>
