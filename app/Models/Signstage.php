<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signstage extends Model
{
    public $timestamps = false;

    protected $table = "signstages";
    protected $primary = "id";
    protected $fillable = ["code", "name", "IsUsed"];
}
