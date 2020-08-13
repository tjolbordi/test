<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployedType extends Model
{

    protected $table = 'employed_types';

    protected $fillable = [
        'title',
    ];

    public function user() {
        return $this->hasMany('App\User');
    }


}
