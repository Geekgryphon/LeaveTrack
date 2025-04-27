<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobExpr extends Model
{
    public $timestamps = false;

    protected $table = 'jobexprs';
    protected $primaryKey = 'id';
    protected $fillable = ['employee_id', 'jobtype', 'seq', 'begindate', 'enddate'];
}
