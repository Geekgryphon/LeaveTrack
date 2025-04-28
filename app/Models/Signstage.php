<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signstate extends Model
{
    public $timestamps = false;

    protected $table = "signstage";
    protected $primary = "id";
    protected $fillable = ["code", "name", "IsUsed"];
}
