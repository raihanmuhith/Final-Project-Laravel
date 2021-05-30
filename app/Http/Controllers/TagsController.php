<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tag;
use App\Berita;
use Auth;

class TagsController extends Controller
{
    public function index()
    {
        //$tags = Tag::where('berita_id', beritas::id);
        
        $tags = Tag::get();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $beritas = Berita::get();
        return view('tags.create', compact('beritas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'berita_id' => 'required'
        ]);

        $tags = Tag::create([
            'nama' => $request['nama'],
            'berita_id' => $request['berita_id']
        ]);
        return redirect('/tags')->with('success', 'Tag Berhasil Disimpan');

    }
    
    public function show($id)
    {
        $tags = Tag::find($id);
        return view('tags.show', compact('tags'));
    }

    
    public function edit($id)
    {

        $tags = Tag::find($id);
        $beritas = Berita::get();
        return view('tags.edit', compact('tags', 'beritas'));
    }

    public function update($id, Request $request)
    {
        
        $update = Tag::where('id', $id)->update([
            'nama' => $request['nama'],
            'berita_id' => $request['berita_id']
        ]);
        return redirect('/tags');
    }

    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect('/tags')->with('success', 'Data sukses dihapus');
    }
}
