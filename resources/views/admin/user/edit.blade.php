@extends('layouts.admin.app')




@section('content')




    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index') }}">User</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tambah User
                </li>
            </ol>
        </nav>




        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah User</h1>
                <p class="mb-0">Form untuk menambahkan data user baru.</p>
            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">




                    {{-- Flash Message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif




                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif




                    {{-- Validation Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif




                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf




                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">




                                {{-- Name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" maxlength="100" required>
                                </div>




                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}" required>
                                </div>




                            </div>




                            <div class="col-lg-4 col-sm-6">
                                {{-- Role --}}
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role"
                                        class="form-select @error('role') is-invalid @enderror" required>
                                        <option value="">Pilih Role</option>
                                        <option value="Super Admin" {{ old('role') == 'Super Admin' ? 'selected' : '' }}>
                                            Super Admin
                                        </option>
                                        <option value="Pelanggan" {{ old('role') == 'Pelanggan' ? 'selected' : '' }}>
                                            Pelanggan
                                        </option>
                                        <option value="Mitra" {{ old('role') == 'Mitra' ? 'selected' : '' }}>
                                            Mitra
                                        </option>
                                    </select>




                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- Password --}}
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>




                                {{-- Confirm Password --}}
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        Confirm Password
                                    </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" required>
                                </div>




                                {{-- Buttons --}}
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">
                                        Batal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>




@endsection