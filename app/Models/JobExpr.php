<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobExpr extends Model
{
    public $timestamps = false;

    protected $table = 'leavetypes';
    protected $primaryKey = 'id';
    protected $fillable = ['employeeID', 'jobtype', 'seq', 'begindate', 'enddate'];
}
