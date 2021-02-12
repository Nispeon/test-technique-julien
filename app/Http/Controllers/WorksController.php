<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWorkRequest;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\DB;

class WorksController extends Controller
{

    public function index()
    {
        $works = DB::table('works')->orderBy('release_date')->get();
        return view('works', compact('works'));
    }

    public function show($id)
    {
        $title = DB::table('works')->where('id', $id)->get();
        $coms = DB::table('comments')->where('posts_id', $id)->join('users', 'users.id', '=', 'comments.users_id')->orderBy('comments.id', 'DESC')->get();
        return view('work', compact('title', 'coms'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|min:5',
            'thumbnail' => 'required',
            'description' => 'required',
            'synopsis' => 'required',
            'release_date' => 'required',
        ]);

        DB::table('works')->insert([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail->getClientOriginalName(),
            'description' => $request->description,
            'synopsis' => $request->synopsis,
            'release_date' => $request->release_date,
        ]);

        $request->thumbnail->move(public_path('storage/thumbnails'), $request->thumbnail->getClientOriginalName());

        return redirect()->route('admin');
    }

    public function edit()
    {
        $titles = DB::table('works')->get();
        return view('admin-board', compact('titles'));
    }

    public function update($id, UpdateWorkRequest $req)
    {
        $work = Work::findOrFail($id);

            $work->fill([
                'title' => $req->newtitle,
                // 'thumbnail' => $req->newthumbnail->getClientOriginalName(),
                'description' => $req->newdescription,
                'synopsis' => $req->newsynopsis,
                'release_date' => $req->newrelease_date
            ]);

            $tries = Work::where('title', $req->newtitle)->where('id','!=',$id)->get();

            if($tries->isEmpty()) {
                $work->save();
                echo "<script>alert('mise à jour effectuée avec succès !')</script>";
                return redirect()->route('admin');
            } else {
                echo "<script>alert('Ce nom d'oeuvre existe déjà !')</script>";
                return redirect()->route('admin');
            }
    }

    public function destroy($id)
    {
        $mort = Work::where('id', $id)->delete();
        return redirect()->route('admin');

    }
}
