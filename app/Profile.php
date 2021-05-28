<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profiles";
    protected $fillable = ['Umur','alamat','bio','user_id'];
    public $timestamps = False;

}
