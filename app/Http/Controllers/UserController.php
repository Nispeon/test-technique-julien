<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        if(isset($_SESSION['online'])) {
            return view('welcome');
        } else {
            return view('user-create');
        }
    }

    public function show($id)
    {

    }

    public function create()
    {
        if(isset($_SESSION['online'])) {
            return view('welcome');
        } else {
            return view('user-create');
        };
    }

    public function edit($id)
    {
        return view('user-edit');
    }

    public function connect()
    {
        return view('user-login');
    }

    public function login(UpdateUserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function store(StoreUserRequest $req)
    {

        if ($req->password == $req->password_verif) {

            // $req->password = Hash::make($req->password);

            $input['email'] = $req->email;

            $rule = array('email' => 'unique:users,email');

            $validator = Validator::make($input, $rule);

            if ($validator->fails()) {
                echo '<script>alert("Adresse déjà utilisée sur ce site")</script>';
                return view('user-create');
            }
            else {
                $user = User::create($req->all());

                $_SESSION['id'] = $user->id;
                $_SESSION['name'] = $req->name;
                $_SESSION['email'] = $req->email;
                $_SESSION['online'] = 1;

                return view('welcome');
            }
        } else {
            echo '<script>alert("Les deux mots de passes ne correspondent pas")</script>';
            return view('user-create');
        }

    }

    public function update($id, UpdateUserRequest $req)
    {
        $user = User::findOrFail($id);
        $user->update($req->all());

        $_SESSION['name'] = $req->upname;

        return redirect('/');
    }

    public function destroy($id)
    {

    }

    public function disconnect()
    {
        session_destroy();
        return view('welcome');
    }
}
