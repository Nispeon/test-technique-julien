<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\DB;

class WorksController extends Controller
{

    public function index()
    {
        $works = DB::table('works')->get();
        return view('works', compact('works'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        DB::table('works')->insert([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail->getClientOriginalName(),
            'description' => $request->description,
            'release_date' => $request->release_date,
        ]);

        $request->thumbnail->move(public_path('storage/thumbnails'), $request->thumbnail->getClientOriginalName());

        return redirect('/');
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
