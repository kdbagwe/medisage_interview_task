@extends('layouts.main')

@section('content')

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        @if ($user)
                            <div class="text-center mt-2 mb-4">
                                <h3>Update User</h3>
                            </div>
                            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data"
                                onsubmit="return validateUpdateUserForm()"
                            >
                                @csrf
                                @method('put')
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label fw-bold">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                                        value="{{ $user->name ? $user->name : (old('name') ?? '') }}"
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
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" disabled
                                        value="{{ $user->email }}"
                                    >
                                    @error ('email')
                                        <div class="invalid-feedback d-inline-block fw-bold">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Change Password:</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                                    @error ('password')
                                        <div class="invalid-feedback d-inline-block fw-bold">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label fw-bold">Confirm New Password:</label>
                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Password" name="password_confirmation">
                                    @error ('password_confirmation')
                                        <div class="invalid-feedback d-inline-block fw-bold">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    @if ($user->profile_picture)
                                        <div class="col-md-6">
                                            <div class="mb-3"><span class="badge bg-info mb-2">Profile Picture</span></div>
                                            <img src='{{ asset("/storage/{$user->profile_picture}") }}' alt="profile picture" class="img-fluid"/>
                                        </div>
                                    @else
                                        <div class="col-md-12"><span class="badge bg-danger">Image Not Uploaded</span></div>
                                    @endif
                                </div>
                                <div class="mb-5 mt-3">
                                    <label for="profile_picture" class="form-label fw-bold">Update Profile Picture:</label>
                                    <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/png,image/webp,image/jpeg,image/jpg">
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
                        @else
                            <h1>User Not Found</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
