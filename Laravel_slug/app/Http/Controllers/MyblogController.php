<?php

namespace App\Http\Controllers;

use App\Models\Myblog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class MyblogController extends Controller
{
    public function getUserGroup(){
        $ug = User::with('getGroup')->get();

        return view('admin.groups', compact('ug'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myblogs = Myblog::get();
        //return $myblogs;
        return view('user.index', compact('myblogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'body_content' => 'required',
            'user_id' => 'required',
        ]);
        $myblog = new Myblog();
        $myblog->create( $request->all() + ['slug' => Str::slug($request->title,"-")]);
        return redirect()->route('myblog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Myblog $myblog)
    {
        $cs = $myblog->getComments;
        return view('user.show', compact('myblog','cs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Myblog $myblog)
    {
        return view('user.edit', compact('myblog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Myblog $myblog)
    {
        $myblog->update( $request->all() + ['slug' => Str::slug($request->title,"-")]);
        return redirect()->route('myblog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Myblog $myblog)
    {
        $myblog->delete();
        return redirect()->route('myblog.index');
    }

    public function recyclebin(){
        //$mytrashes = Myblog::withTrashed()->get();
        $mytrashes = Myblog::onlyTrashed()->get();
        return view('user.trashed', compact('mytrashes'));
    }

    public function recover($id){
        $data = Myblog::onlyTrashed($id)->where('id', $id)->restore();
        return redirect()->route('myblog.index');

    }
}
