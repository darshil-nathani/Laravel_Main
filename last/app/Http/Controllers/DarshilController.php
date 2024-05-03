<?php

namespace App\Http\Controllers;

use App\Models\darshil;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class DarshilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $page = darshil::get();
        return view('user.index',compact('page','user'));
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
        $darshil = New darshil();
        // $darshil -> title = $request->title;
        // $darshil -> subtitle = $request->subtitle;
        // $darshil->user_id = $request->user_id;
        // $darshil->slug = Str::slug($request->title,"-");
        darshil::create($request->all() + ['slug'=> Str::slug($request->title,'-'),
                                            'user_id'=>auth()->user()->id]);
        $darshil->save();
        return redirect()->route('page.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(darshil $darshil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(darshil $darshil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, darshil $darshil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(darshil $darshil)
    {
        //
    }
}


