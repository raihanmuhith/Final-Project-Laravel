<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Berita;

class Tag extends Model
{
    protected $table = "tags";
    protected $fillable = ["nama", "berita_id"];
    public $timestamps = false;
    protected $guarded = [];

    public function berita() {
        return $this->belongsTo('App\Berita', 'berita_id');
    }
}
