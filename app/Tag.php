<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Tag extends Model
{
    protected $table = "tags";
    protected $guarded = [];

    public function berita() {
        return $this->belongsTo('App\Tag', 'beritas_id');
    }
}
