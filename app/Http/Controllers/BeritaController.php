<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BeritasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Berita;
use App\Tag;
use DB;
use PDF;
use App\Comment;
use RealRashid\SweetAlert\Facades\Alert;


class BeritaController extends Controller
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
        Alert::success('Success!!', 'Success Menambahkan Data');
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
        $tags = Tag::where('berita_id', $id)->get();
        $comment = Comment::where('berita_id',$id)->get();
        return view('beritas.show', compact('beritas','tags','comment'));
    }

    
    public function edit($id)
    {
        $beritas = DB::table('beritas')->where('id', $id)->first();
        return view('beritas.edit', compact('beritas'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'judul' => 'required',
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

    public function destroy($berita_id){

        // Berita::find($berita_id)->delete();
        DB::table('tags')->where('berita_id', $berita_id)->delete();
        DB::table('comments')->where('berita_id', $berita_id)->delete();
        DB::table('beritas')->where('id', $berita_id)->delete();
        // Alert::success('Success!!', 'Success Menghapus Data');
        return redirect('/beritas')->with('success','Data Berita Berhasil di hapus');
    }

    public function export(){
        return Excel::download(new BeritasExport, 'BeritaTable.xlsx');
    }

    public function pdf($berita_id){
        $berita = Berita::find($berita_id);
        $tags = DB::table('tags')->where('berita_id',$berita_id)->get();
        $pdf = PDF::loadView('pdf.detail', compact('berita','tags'));
        return $pdf->download('detail_berita_' . $berita['id'] . '.pdf');
    }

}
