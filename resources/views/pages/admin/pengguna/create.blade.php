@extends('pages.admin.layouts.main')

@section('title', 'Tambah Data Pengguna')

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
            <a class="breadcrumb-item" href="{{ route('pengguna.index') }}"><i class="fas fa-home me-1"></i>Data Pengguna</a>
            <span class="breadcrumb-item active">Tambah Data</span>
        </nav>
        <div class="block block-rounded">
            <div class="block-header block-header-default  d-flex justify-content-between align-items-center">
                <h3 class="block-title">
                    Tambah Data Pengguna <small>System</small>
                </h3>
            </div>
            <div class="block-content">
                <form action="{{ route('pengguna.store') }}" method="POST" id="form-user">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="username">Nama</label>
                        <input type="text" class="form-control form-control-alt @error('name') is-invalid @enderror"
                            id="name" name="name" required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" class="form-control form-control-alt @error('username') is-invalid @enderror"
                            id="username" name="username" required value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div class="form-floating">
                            <select class="form-select" id="contact2-subject" name="role" size="1"
                                placeholder="Enter your subject" required>
                                <option value="" disabled selected>Pilih Role</option>
                                @foreach ($role as $role)
                                    <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                            <label class="form-label" for="role">Role</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control form-control-alt @error('email') is-invalid @enderror"
                            id="email" name="email" required value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <a id="show-confirm-button" class="btn btn-primary">
                            <i class="fa fa-plus opacity-50 me-1"></i> Simpan Data Pengguna
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        document.getElementById('show-confirm-button').addEventListener('click', function() {
            // Perform validation here
            var isValid = validateForm(); // Call the validation function

            if (isValid) {
                Swal.fire({
                    title: 'Konfirmasi Simpan',
                    text: 'Apakah Anda yakin ingin menyimpan data Pengguna?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, submit the form
                        document.getElementById('form-user').submit();
                    }
                });
            }
        });

        // Validation function
        function validateForm() {
            var isValid = true;

            var requiredFields = document.querySelectorAll('[required]');

            for (var i = 0; i < requiredFields.length; i++) {
                if (!requiredFields[i].value) {
                    isValid = false;
                    break;
                }
            }

            var emailField = document.getElementById('email');
            var emailValue = emailField.value;

            if (emailValue) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailValue)) {
                    isValid = false;
                    emailField.classList.add('is-invalid');
                    var errorElement = document.createElement('div');
                    errorElement.className = 'invalid-feedback';
                    errorElement.innerHTML = 'masukkan alamat email yang valid';
                    emailField.parentNode.appendChild(errorElement);
                }
            }

            return isValid;
        }
    </script>
@endpush
