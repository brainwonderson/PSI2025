<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password tidak boleh kosong.'
        ]);

        if($validator->passes()){

            if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
                return redirect()->route('account.dashboard');
            } else{
                return redirect()->route('account.login')->with('error', 'Email atau password salah');

            }

        } else{
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }
    }

    public function register(){
       
        return view('register');
    }

    public function processRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:24|confirmed',
        ],
        [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.max' => 'Password tidak boleh lebih dari 24 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.'
        ]
    );
    
        if($validator->passes()){
            $user = new User();
            $user->name = $request->name; 
            $user->email = $request->email; 
            $user->password = Hash::make($request->password);
            $user->role = 'petugas';
            $user->save();
            return redirect()->route('account.login')->with('registerSuccess', true);
        } else{
            return redirect()->route('account.register')->withInput()->withErrors($validator);
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }   
}

