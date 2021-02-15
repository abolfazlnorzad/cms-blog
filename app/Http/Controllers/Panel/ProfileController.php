<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        return view('panel.profile');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'email', Rule::unique('users')->ignore(auth()->user()->id)],
            'mobile' => ['required', 'max:14', Rule::unique('users')->ignore(auth()->user()->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'profile' => ['nullable', 'image', 'max:2024'],
        ]);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }else{
            unset($data['password']);
        }

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' . $ext;
            $file->storeAs('images/profile', $file_name, 'public_files');
            $data['profile'] = $file_name;
        }else{
            unset($data['profile']);
        }

        auth()->user()->update($data);
        alert()->info("حساب کاربری با موفقیت ویرایش شد", "موفقیت آمیز");
        return redirect(route('profile'));

    }
}
