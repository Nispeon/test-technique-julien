<?php

namespace App\Http\Controllers;

// Appelle des class nécessaires

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

    // Afficher la page de connexion si l'utilisateur n'est pas connecté
    public function index()
    {
        if(session()->has('online')) {
            return redirect()->route('home');
        } else {
            return view('user-create');
        }
    }

    // Afficher la page de connexion si l'utilisateur n'est pas connecté
    public function create()
    {
        if(session()->get('online') != "") {
            return view('welcome');
        } else {
            return view('user-create');
        };
    }

    // Afficher la page de modicfication du profil
    public function edit($id)
    {
        return view('user-edit');
    }

    // Afficher la page de connexion
    public function connect()
    {
        return view('user-login');
    }

    // Requetes de connexion
    public function login(UpdateUserRequest $request)
    {

        // Verification des logins donnés
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            // Connexion si succès
            $user = User::where('email', $request->email)->first();
                session([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'online' => 1,
                ]);

            return redirect()->route('home');
        } else {
            echo '<script>confirm("Mauvaise combinaison pseudo / mot de passe"); window.location.href = "' . route("login") . '";</script>';
        }
    }

    // Création de compte
    public function store(StoreUserRequest $req)
    {

        // Si l'user à mis le même mdp deux fois comme demandé, la fonction se lance
        if ($req->password == $req->password_verif) {

            // Validation des règles d'enregistrement
            $validated = $req->validate([
                'name' => 'required|unique:users|min:5',
                'email' => 'required|unique:users|',
            ]);
            $input['email'] = $req->email;
            $rule = array('email' => 'unique:users,email');
            $validator = Validator::make($input, $rule);
            if ($validator->fails()) {
                echo '<script>alert("Adresse déjà utilisée sur ce site")</script>';
                return view('user-create');

            } else {

                // Envoie des données en bdd
                DB::table('users')->insert([
                    'name'      => $req->name,
                    'email'     => $req->email,
                    'password'  => Hash::make($req->password),
                ]);

                // récupération de l'id du nouveau user pour l'intégrer à la session
                $user = User::where('email', $req->email)->first();

                // Passage des infos de l'user à la session
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

    // Requetes de changement des infos du compte
    public function update($id, UpdateUserRequest $req)
    {

        // Vérification du mot de passe
        $credentials = [
            'password'  => $req->password,
            'name'      => session()->get('name')
        ];
        if (Auth::attempt($credentials)) {

            // récupération des données actuelles et actualisation en fonction des champs remplis
            $user = User::findOrFail($id);
            if($req->newpass != '') {
                $user->fill([
                    'name' => $req->upname,
                    'password' => Hash::make($req->newpass),
                ]);
            } else {
                $user->fill([
                    'name' => $req->upname,
                    'password' => Hash::make($req->password),
                ]);
            }

            // Check si le nom est déjà prit
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

    // Déconnexion
    public function disconnect()
    {
        session_destroy();
        return redirect()->route('home');
    }
}
