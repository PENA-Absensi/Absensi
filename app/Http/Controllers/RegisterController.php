<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate(
            [
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('failed', 'username atau password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('Success', 'Kamu Berhasil Logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required|max:4',
            'password' => 'required|min:6'
        ]);

        $data['username'] = $request->username;
        $data['alamat'] = $request->alamat;
        $data['jurusan'] = $request->jurusan;
        $data['angkatan'] = $request->angkatan;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $login = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('failed', 'username atau password salah');
        }
    }

    public function deleteData($id)
    {
        $data = user::where('id', $id)->first();
        $data->delete();
        Alert::success('Success delete data');
        return redirect()->back();
    }

    function manajemen(){
        $data = User::all();
        return view('admin.manajemen')->with('data', $data);
        // return view('admin.manajemen');
    }

    // public function absen()
    // {
    //     $data = User::all();
    //     return view('admin.absen')->with('data', $data);
    // }


}
