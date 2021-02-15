<?php

namespace App\Http\Controllers;

// Appelle des class nécessaires
use App\Http\Requests\UpdateWorkRequest;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\DB;

class WorksController extends Controller
{

    // Afficher la page d'oeuvres
    public function index()
    {
        $works = DB::table('works')->orderBy('release_date')->get();
        return view('works', compact('works'));
    }

    // Afficher une oeuvre en particulier
    public function show($id)
    {
        $title = DB::table('works')->where('id', $id)->get();
        $coms = DB::table('comments')->where('posts_id', $id)->join('users', 'users.id', '=', 'comments.users_id')->orderBy('comments.id', 'DESC')->get();
        return view('work', compact('title', 'coms'));
    }

    // Créer une nouvelle entrée dans la bdd
    public function store(Request $request)
    {

        // Valider que la requête soit correcte
        $validated = $request->validate([
            'title' => 'required|min:5',
            'thumbnail' => 'required',
            'description' => 'required',
            'synopsis' => 'required',
            'release_date' => 'required',
        ]);

        // Insertion dans la bdd
        DB::table('works')->insert([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail->getClientOriginalName(),
            'description' => $request->description,
            'synopsis' => $request->synopsis,
            'release_date' => $request->release_date,
        ]);

        // Sauvegarde de l'image sur le storage
        $request->thumbnail->move(public_path('storage/thumbnails'), $request->thumbnail->getClientOriginalName());

        return redirect()->route('admin');
    }

    // Afficher la page admin pour ajouter/modifier/supprimer une oeuvre
    public function edit()
    {
        $titles = DB::table('works')->get();
        return view('admin-board', compact('titles'));
    }

    // requete pour éditer une oeuvre
    public function update($id, UpdateWorkRequest $req)
    {
        // Trouver l'oeuvre à editer
        $work = Work::findOrFail($id);

        $work->fill([
            'title' => $req->newtitle,
            'description' => $req->newdescription,
            'synopsis' => $req->newsynopsis,
            'release_date' => $req->newrelease_date
        ]);

        // Vérifier qu'aucune autre oeuvre n'ait déjà le nouveau nom
        $tries = Work::where('title', $req->newtitle)->where('id','!=',$id)->get();
        if($tries->isEmpty()) {
            $work->save();
            echo "<script>alert('Mise à jour effectuée avec succès !')</script>";
            return redirect()->route('admin');
        } else {
            echo "<script>alert('Ce nom d'oeuvre existe déjà !')</script>";
            return redirect()->route('admin');
        }
    }

    // Supprimer une oeuvre
    public function destroy($id)
    {
        $mort = Work::where('id', $id)->delete();
        return redirect()->route('admin');

    }
}
