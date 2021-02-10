<?php

namespace App\Http\Controllers;

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
        return view('work', compact('title'));
    }

    public function store(Request $request)
    {
        DB::table('works')->insert([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail->getClientOriginalName(),
            'description' => $request->description,
            'synopsis' => $request->synopsis,
            'release_date' => $request->release_date,
        ]);

        $request->thumbnail->move(public_path('storage/thumbnails'), $request->thumbnail->getClientOriginalName());

        return redirect()->route('home');
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
