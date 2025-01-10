<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    public $timestamps = false;

    protected $table = 'leavetypes';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'name'];
}
