<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\Access\Authorizable;

class Role extends Model
{
    use HasFactory;
    use Authorizable;

    protected $table = 'roles';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
