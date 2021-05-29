<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tag;
use Auth;

class TagsController extends Controller
{
    public function index()
    {
        //$tags = Tag::where('berita_id', beritas::id);
        $tags = Tag::find($id);
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:tags',
            'berita_id' => 'required'
        ]);
        // $query = DB::table('tags')->insert([
        //     "nama" => $request["nama"],
        //     "beritas_id" => $request["beritas_id"]
        // ]);
        $tags = Tag::create([
            'nama' => $request['nama'],
            'berita_id' => Auth::id()
        ]);
        return redirect('/tags')->with('success', 'Tag Berhasil Disimpan');

    }
    
    public function show($id)
    {
        //$tags = DB::table('tags')->where('id', $id)->first();
        $tags = Tag::find($id);
        dd($tags->berita);
        return view('tags.show', compact('tags'));
    }

    
    public function edit($id)
    {
        //$tags = DB::table('tags')->where('id', $id)->first();
        $tags = Tag::find($id);
        return view('tags.edit', compact('tags'));
    }

    public function update($id, Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|unique:tags',
        //     'beritas_id' => 'required'
        // ]);

        // $query = DB::table('tags')
        //     ->where('id', $id)
        //     ->update([
        //         "nama" => $request["nama"],
        //         "beritas_id" => $request["beritas_id"]
        //     ]);
        $update = Tag::where('id', $id)->update([
            'nama' => $request['nama'],
            'berita_id' => Auth::id()
        ]);
        return redirect('/tags');
    }

    public function destroy($id)
    {
        //$query = DB::table('tags')->where('id', $id)->delete();
        Tag::destroy($id);
        return redirect('/tags')->with('success', 'Data sukses dihapus');
    }
}
