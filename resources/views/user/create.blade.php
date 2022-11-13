@extends('layouts.main')

@section('content')

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-2 mb-4">
                            <h3>Add User</h3>
                        </div>
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data"
                            onsubmit="return validateAddUserForm()"
                        >
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label fw-bold">Name:</label>
                                <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name"
                                    value="{{ old('name') }}"
                                    onblur="requiredField(event)"
                                    onkeyup="requiredField(event)"
                                >
                                @error ('name')
                                    <div class="invalid-feedback d-inline-block fw-bold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label fw-bold">Email:</label>
                                <input type="email" class="form-control @error ('email') is-invalid @enderror" id="email" placeholder="Enter Email" name="email"
                                    value="{{ old('email') }}"
                                    onblur="requiredField(event)"
                                    onkeyup="requiredField(event)"
                                >
                                @error ('email')
                                    <div class="invalid-feedback d-inline-block fw-bold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password:</label>
                                <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password" placeholder="Enter Password" name="password"
                                    value="{{ old('password') }}"
                                    onblur="requiredField(event)"
                                    onkeyup="requiredField(event)"
                                >
                                @error ('password')
                                    <div class="invalid-feedback d-inline-block fw-bold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-bold">Confirm Password:</label>
                                <input type="password" class="form-control @error ('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}"
                                    onblur="requiredField(event)"
                                    onkeyup="requiredField(event)"
                                >
                                @error ('password_confirmation')
                                    <div class="invalid-feedback d-inline-block fw-bold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-5 mt-3">
                                <label for="profile_picture" class="form-label fw-bold">Select Profile Picture:</label>
                                <input type="file" class="form-control @error ('profile_picture') is-invalid @enderror" id="profile_picture" name="profile_picture" accept="image/png,image/webp,image/jpeg,image/jpg">
                                @error ('profile_picture')
                                    <div class="invalid-feedback d-inline-block fw-bold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
