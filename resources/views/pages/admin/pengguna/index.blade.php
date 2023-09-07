@extends('pages.admin.layouts.main')

@section('title', 'Data Pengguna')

@section('content')
    <div class="content">
        <nav class="breadcrumb push bg-transparent rounded push px-4 py-2">
            <a class="breadcrumb-item" href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a>
            <span class="breadcrumb-item active">Data Pengguna</span>
        </nav>
        <div class="block block-rounded">
            <div class="block-header block-header-default  d-flex justify-content-between align-items-center">
                <h3 class="block-title">
                    Data Pengguna <small>System</small>
                </h3>
                <a href="{{ route('pengguna.create') }}" class="btn btn-outline-primary btn-sm me-1 mb-1">
                    <i class="si si-plus opacity-50 me-1"></i> Add User
                </a>
            </div>
            <div class="block-content block-content-full">
                <table
                    class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination js-table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th class="text-center" style="width: 15%;">Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengguna as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $user->name }} <br>
                                    <small class="d-lg-none d-sm-table-cell">
                                        <span class="badge bg-success">
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    {{ $v }}
                                                @endforeach
                                            @endif
                                        </span>
                                    </small>
                                </td>
                                <td class="d-none d-sm-table-cell">{{ $user->email }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge bg-success">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                {{ $v }}
                                            @endforeach
                                        @endif
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('pengguna.show', $user->id) }}" type="button"
                                        class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="View User">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    @if ($user->getRoleNames()->first() != 'User')
                                        @php
                                            $adminCount = $pengguna->where('roles', 'Admin')->count();
                                        @endphp
                                        @if ($adminCount > 1 || $user->getRoleNames()->first() != 'Admin')
                                            <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="tooltip" title="Delete User" onclick="confirmDelete()">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Tindakan ini tidak dapat diurungkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mengirim form jika pengguna menekan tombol "Ya, hapus!"
                document.querySelector('form').submit();
            } else {
                // Menampilkan peringatan ketika pengguna memilih tombol "Batal"
                Swal.fire(
                    'Information',
                    'Data pengguna aman :)',
                    'info'
                );
            }
        });
    }
</script>

@endpush
