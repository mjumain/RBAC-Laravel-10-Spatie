<section>
    @if (session('status') === 'password-updated')
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Berhasil</h6>
                    <div class="text-white">Password berhasil diperbarui !</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Password Lama</label>
            <div class="position-relative input-icon">
                <input type="password" name="current_password"
                    class="form-control  {{ !empty($errors->updatePassword->get('current_password')) ? 'is-invalid' : '' }} "
                    placeholder="Password Lama">
                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-key'></i></span>
            </div>
            <strong style="font-size: 12px; color:red">
                {{ $errors->getBag('updatePassword')->first('current_password') }}
            </strong>
        </div>
        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <div class="position-relative input-icon">
                <input type="password" name="password"
                    class="form-control {{ !empty($errors->updatePassword->get('password')) ? 'is-invalid' : '' }}"
                    placeholder="Password Baru">
                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-key'></i></span>
            </div>
            <strong style="font-size: 12px; color:red">
                {{ $errors->getBag('updatePassword')->first('password') }}
            </strong>
        </div>
        <div class="mb-3">
            <label class="form-label">Ulangi Password Baru</label>
            <div class="position-relative input-icon mb-3">
                <input type="password" name="password_confirmation"
                    class="form-control {{ !empty($errors->updatePassword->get('password_confirmation')) ? 'is-invalid' : '' }}"
                    placeholder="Ulangi Password Baru">
                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-key'></i></span>
            </div>
            <strong style="font-size: 12px; color:red">
                {{ $errors->getBag('updatePassword')->first('password_confirmation') }}
            </strong>
        </div>

        @include('tombol.save')
    </form>
</section>
