<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('name', '!=', Auth::user()->name)->paginate(5);

        return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
        $user = new User();
        return view('admin.users.create', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $user = new User();

        $this->validate($request, User::rules());

        $result = $user->fill($request->all())->save();

        if ($result) {
            return redirect()->route('Admin.users.create')->with('success', 'Пользователь добавлен успешно!');
        } else {
            return redirect()->route('Admin.users.create')->with('error', 'Ошибка добавления пользователя!');
        }


    }

    public function edit(User $user)
    {
        return view('admin.users.create', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        $this->validate($request, $this->rules($user));

        if (isset($data['password'])) {

            $data['password'] = Hash::make($data['password']);
            $result = $user->fill($data)->save();

        } else {
            $result = $user->fill($request->except(['password', 'password_confirmation']))->save();
        }


        if ($result) {
            return redirect()->route('Admin.users.index')->with('success', 'Пользователь изменен успешно!');
        } else {
            return redirect()->route('Admin.users.index')->with('error', 'Ошибка измененеия пользователя!');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('Admin.users.index')->with('success', 'Пользователь удален успешно!');
    }

    public function rules(User $user)
    {
        return [
            'name' => 'required|min:3:|max:30|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes:min:3',
            'password_confirmation' => 'same:password',
        ];
    }

    public function toggleStatus($id)
    {
        $user = User::query()->find($id);
        $user->is_admin = $user->is_admin ? 0 : 1;
        $user->save();
        return response()->json(['id'=> $user->id, 'name' => $user->name, 'is_admin' => $user->is_admin]);
    }

}
