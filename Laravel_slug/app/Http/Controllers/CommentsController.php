<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class CommentsController extends Controller
{
    public function store(Request $request){
        Comments::create($request->all());
        return redirect()->route('myblog.show', $request->myblog_id);
    }
    public function destroy(Comments $comment){

    }
}
