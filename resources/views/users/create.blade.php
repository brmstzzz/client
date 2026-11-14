
@extends('layout')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Users</h3>
                        </div>

                        <!-- form start -->
                        <form class="form-validate" method="post" action="{{ route('users.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="inputError" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="inputError" value="{{ old('email') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="inputError" value="{{ old('password') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputaddress">Alamat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" id="inputError" value="{{ old('address') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPhoneNumber">No. Hp. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number" id="inputError" value="{{ old('phone_number') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCity">Kota <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        name="city" id="inputError" value="{{ old('city') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputRoles">Roles <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="roles" required>
                                        <option value=""> Pilih </option>
                                        <option value="1"> Admin </option>
                                        <option value="2"> User </option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
