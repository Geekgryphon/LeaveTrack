<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'sex', 'mobile', 'birthday', 'city_id', 
                           'district_id', 'street', 'emergencycontactname', 'emergencycontactphone'];
}
