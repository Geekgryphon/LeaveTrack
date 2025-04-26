<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'employeeno';
    protected $keyType = 'string';

    protected $table = 'employees';
    protected $fillable = ['employeeno', 'name', 'sex', 'mobile', 'birthday', 'city_id', 
                           'district_id', 'street'];

}
