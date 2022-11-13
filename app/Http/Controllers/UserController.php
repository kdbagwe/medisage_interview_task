<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SearchUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use UploadFileTrait;

    public function index(Request $request, User $users)
    {
        $users = $users->newQuery();

        $users = $users->when($request->has('search_input'), function($query) use($request) {

            $query->where('name', 'LIKE', "%{$request->search_input}%")
                ->orWhere('email', 'LIKE', "%{$request->search_input}%");
        });

        $users = $users->latest()->paginate(5)->appends([
            'search_input' => $request->search_input
        ]);

        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(RegisterUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $this->upload($request->file('profile_picture'))
        ]);

        return redirect()->back()->with('notify', 'User Added Successfully');
    }

    public function edit($id)
    {
        return view('user.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update($id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->file('profile_picture')) {

            $prevProfile = $user->profile_picture ?? null;

            $data['profile_picture'] = $this->upload($request->file('profile_picture'));
        }

        $user->update($data);

        // remove prev image from file storage
        if (isset($prevProfile) && $prevProfile) {

            $this->remove($prevProfile);
        }

        return redirect()->back()->with('notify', 'User Details Updated Successfully');
    }

    public function login(UserLoginRequest $request)
    {
        if (!Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->get('remember'))) {

            return response()->json([
                'message' => 'Invalid Credentials'
            ], 400);
        }

        $token = Auth::user()->createToken('user-auth-token');

        return [
            'user' => new UserResource(Auth::user()),
            'userToken' => $token->plainTextToken
        ];
    }
}
