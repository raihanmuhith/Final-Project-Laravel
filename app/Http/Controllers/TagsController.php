<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function create()
    {
        return view('beritas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:beritas',
            'content' => 'required',
            'penulis' => 'required'
        ]);
        $query = DB::table('beritas')->insert([
            "judul" => $request["judul"],
            "content" => $request["content"],
            "penulis" => $request["penulis"]
        ]);
        return redirect('/beritas');

    }

    public function index()
    {
        $beritas = DB::table('beritas')->get();
        return view('beritas.index', compact('beritas'));
    }

    
    public function show($id)
    {
        $beritas = DB::table('beritas')->where('id', $id)->first();
        return view('beritas.show', compact('beritas', 'tags'));
    }

    
    public function edit($id)
    {
        $beritas = DB::table('beritas')->where('id', $id)->first();
        return view('beritas.edit', compact('beritas'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:beritas',
            'content' => 'required',
            'penulis' => 'required'
        ]);

        $query = DB::table('beritas')
            ->where('id', $id)
            ->update([
                "judul" => $request["judul"],
                "content" => $request["content"],
                "penulis" => $request["penulis"]
            ]);
        return redirect('/beritas');
    }

    public function destroy($id)
    {
        $query = DB::table('beritas')->where('id', $id)->delete();
        return redirect('/beritas')->with('success', 'Data sukses dihapus');
    }
}
