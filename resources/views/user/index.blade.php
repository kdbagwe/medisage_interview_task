@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{ route('users.index') }}" method="get"
                    onsubmit="return validateSearchUserForm()"
                >
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" placeholder="Enter Name or Email" name="search_input" id="search_input"
                            value="{{ request()->input('search_input') }}"
                        >
                        <button class="btn btn-success" type="submit">Search</button>
                        @if (request()->input('search_input'))
                            <a class="btn btn-danger" href="{{ route('users.index') }}">Reset</a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-6 offset-md-3">
                <table class="table mb-5">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($users) && count($users))
                            @foreach ($users as $key => $user)
                                <tr class="table-light">
                                    <td>{{ $key + $users->firstItem() }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="3">No Users To Show</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div>
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
