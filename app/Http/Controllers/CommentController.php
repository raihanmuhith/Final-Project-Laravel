<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Berita;
use App\User;
use App\Comment;
use DB;

class CommentController extends Controller
{

    public function index(){
        $comment = Comment::where('user_id',Auth::user()->id)->get();
        return view('comments.index',compact('comment'));
    }

    public function create(Request $request, $berita_id){
        Comment::create([
            'user_id' => Auth::user()->id,
            'berita_id' => $berita_id,
            'komentar' => $request['comment'],
        ]);
        return redirect("/beritas/" . $berita_id );
    }

    public function edit($comment_id){
        $comment = Comment::find($comment_id);
        return view('comments.edit',compact('comment'));
    }

    public function update($comment_id, Request $request){
    
        
        $update = Comment::where('id',$comment_id)->update([
            'komentar' => $request['comment'],
        ]);

        return redirect('/comments')->with('success','Komentar Berhasil di Update');
    }
    
    public function destroy($comment_id){
        Comment::find($comment_id)->delete();
        return redirect('/comments')->with('success','Komentar Berhasil di hapus');
    }
}
