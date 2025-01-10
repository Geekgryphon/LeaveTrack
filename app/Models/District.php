<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;

    protected $table = "districts";
    protected $primaryKey = "id";
    protected $fillable = ["city_id", "zipcode", "name", "seq"];
}
