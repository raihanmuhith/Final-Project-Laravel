<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = ['user_id','berita_id','komentar'];
    public $timestamps = False;

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function berita(){
        return $this->belongsTo('App\Berita','berita_id');
    }

}
