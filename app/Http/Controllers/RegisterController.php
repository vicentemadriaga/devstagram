<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }
    public function store(Request $request) {
        //dd($request);
        //dd($request->get('username'));
        //VALIDACIONES
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'name' => ['required' , 'max:30' ],
            'username' => ['required' , 'unique:users', 'max:20', 'min:5' ],
            'email' => ['required' , 'unique:users', 'max:60' , 'email' ],
            'password' => ['required','confirmed', 'min:6'],
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('post.index' , auth()->user()->username);
    }
}
