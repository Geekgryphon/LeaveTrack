<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signstagedetail extends Model
{
    public $timestamps = false;

    protected $table = "signstagedetails";
    protected $primary = "id";
    protected $fillable = ["signstage_id", "employee_id", "order"];
}
