<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgencyLocation extends Model
{
    //
    protected $fillable=[
'name','latitude','longitude','phone','address','status'
    ];
}
