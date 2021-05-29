<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $guarded = [];

    public function news() {
        return $this->belongsTo('App\tags');
    }
}
