<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user()->id;
        DB::table('comments')->insert([
            'user_id' => $user,
            'post_id' => $request->post_id,
            'content' => $request->comment,
            'created_at' => now()
        ]);
        return redirect("/show/$request->post_id");
    }
}
