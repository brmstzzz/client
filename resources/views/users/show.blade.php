@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-validate" method="post" action="{{ route('users.update', $dt['id']) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nama <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="inputName" value="{{ old('name', $dt['name']) }}" required>
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="inputEmail" value="{{ old('email', $dt['email']) }}" required>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Password <small class="text-muted"></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="inputPassword" placeholder="Masukkan password baru">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Alamat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" id="inputAddress" value="{{ old('address', $dt['address']) }}" required>
                                        @error('address')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhoneNumber">No. Hp. <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" id="inputPhoneNumber" value="{{ old('phone_number', $dt['phone_number']) }}" required>
                                        @error('phone_number')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity">Kota <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" id="inputCity" value="{{ old('city', $dt['city']) }}" required>
                                        @error('city')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputRoles">Roles <span class="text-danger">*</span></label>
                                        <select class="custom-select @error('roles') is-invalid @enderror" name="roles" id="inputRoles" required>
                                            <option value="">Pilih</option>
                                            <option value="1" {{ old('roles', $dt['roles']) == 1 ? 'selected' : '' }}>Admin</option>
                                            <option value="2" {{ old('roles', $dt['roles']) == 2 ? 'selected' : '' }}>User</option>
                                        </select>
                                        @error('roles')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (right) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection 