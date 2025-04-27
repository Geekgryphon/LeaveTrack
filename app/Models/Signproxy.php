<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signproxy extends Model
{
    public $timestamps = false;

    protected $table = "signproxy";
    protected $primaryKey = "id";
    protected $fillable = ["employee_id", "proxy_id", "begintime", "endtime"];
}
