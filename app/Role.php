<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'title',
    ];

    public function user() {
        return $this->hasMany('App\User');
    }
}
