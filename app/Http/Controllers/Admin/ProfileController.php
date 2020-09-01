<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {
            $this->validate($request, $this->rules(), [], $this->attributeNames());

            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                   'name' => $request->post('name'),
                   'email' => $request->post('email'),
                   'password' => Hash::make($request->post('newPassword')),
                ]);
                $user->save();
                return redirect(route('Admin.updateProfile'))->with('success', 'Профиль успешно изменен!');
            } else {
                $errors['password'][] = 'Неверно ввведен текущий пароль';
                $request->flash();
                return redirect(route('Admin.updateProfile'))->withErrors($errors);
            }

        }
        return view('admin.profile', [
            'user' => $user,
        ]);
    }

    protected function rules() {
        return [
            'name' => 'required|string|min:3|max:20|unique:users,name,' . Auth::id(),
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'sometimes:string|sometimes:min:3'
        ];
    }
    protected function attributeNames() {
        return [
          'newPassword' => 'новый пароль'
        ];
    }
}
