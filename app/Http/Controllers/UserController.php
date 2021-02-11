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
            $user = User::where('email', $request->email)->first();

                session([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'online' => 1,
                ]);

            return redirect()->route('home');
        } else {
            echo '<script>alert("Mauvaise combinaison pseudo / mot de passe")</script>';
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

                DB::table('users')->insert([
                    'name'      => $req->name,
                    'email'     => $req->email,
                    'password'  => Hash::make($req->password),
                ]);

                $user = User::where('email', $req->email)->first();

                session([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'online' => 1,
                ]);

                return redirect()->route('home');
            }
        } else {
            echo '<script>alert("Les deux mots de passes ne correspondent pas")</script>';
            return view('user-create');
        }

    }

    public function update($id, UpdateUserRequest $req)

    {

        $credentials = [
            'password'  => $req->password,
            'name'      => session()->get('name')
        ];

        // dd($credentials);


        if (Auth::attempt($credentials)) {
            $user = User::findOrFail($id);

            $user->fill([
                'name' => $req->upname,
                'password' => Hash::make($req->newpass),
            ]);

            $tryName = User::where('name', $req->upname)->where('id','!=',session()->get('id'))->get();

            if($tryName->isEmpty()) {
                $user->save();
                session(['name' => $req->upname]);

                return redirect()->route('home');
            } else {
                echo "<script>alert('Pseudo déjà prit')</script>";
                return view('user-edit');
            }
        } else {
            echo "<script>alert('Mauvais mot de passe')</script>";
            return view('user-edit');
        }





    }

    public function destroy($id)
    {

    }

    public function disconnect()
    {
        session_destroy();
        return redirect()->route('home');
    }
}
