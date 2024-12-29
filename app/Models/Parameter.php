<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    public $timestamps = false;

    protected $table = 'parameters';
    protected $primaryKey = 'id';
    protected $fillable = ['type', 'name', 'description', 'value', 'sequence'];
}
