<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommentsController extends Controller
{

    public function store(Request $request)
    {
        // dd($request);

        DB::table('comments')->insert([
            'users_id'   => session()->get('id'),
            'content'   => $request->comment,
            'posts_id'   => $request->postId,
            "posted_at" =>  date('Y-m-d'),
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('works.show', $request->postId);
    }

}
