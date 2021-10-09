<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Posters;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function profile()
    {
        $data = ['User' => User::where('id', '=', session('LoggedUser'))->first()];

        return view('profile', $data);
    }

    public function dashboard()
    {
        $data = ['User' => User::where('id', '=', session('LoggedUser'))->first()];
        $data['Posters'] = Posters::getAll();

        return view('dashboard', $data);
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:20'
        ]);


        $userInfo = User::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'Usuário não encontrado');
        } else {
            if (!Hash::check($request->password, $userInfo->password)) {
                return back()->with('fail', 'Senha Incorreta');
            } else {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('dashboard');
            }
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $save = $user->save();

        if ($save) {
            return view('auth.login');
        } else {
            return back()->with('fail', 'Ocorreu um erro');
        }
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
        }

        if (session()->has('Cart')) {
            session()->pull('Cart');
        }

        return redirect('/auth/login');
    }
}
