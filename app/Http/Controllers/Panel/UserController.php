<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::query()->latest()->paginate(15);
        return view('panel.users.index', compact('users'));
    }


    public function create()
    {
        return view('panel.users.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users,email'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users,email'],
            'role' => ['required', 'string'],
        ]);
        User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'role' => $data['role'],
            'password' => bcrypt('password')
        ]);

        return redirect(route('users.index'));
    }


    public function edit(User $user)
    {
        return view('panel.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'mobile' => ['required', 'string', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => ['required', 'string'],
        ]);
        $user->update($data);

        return redirect(route('users.index'));

    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }
}
