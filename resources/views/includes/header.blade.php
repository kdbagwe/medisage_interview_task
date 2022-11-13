@if (Session::has('notify'))
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="alert alert-success alert-dismissible text-center mt-5">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>{{ Session::get('notify') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() === 'users.create') active disabled @else bg-light @endif"
                        href="{{ route('users.create') }}"
                    >
                        Add a User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() === 'users.index') active disabled @else bg-light @endif"
                        href="{{ route('users.index') }}"
                    >
                        Users
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
