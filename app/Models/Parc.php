<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parc extends Model
{
    use HasFactory;

    protected $table = 'parcs';

    protected $fillable = [
        'libelle',
        'position',
        'user_id'
    ];

    protected static function booted() {

        static::creating(function ($parc) {
            $parc->user_id = auth()->id();
        });
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function inventaires(){
        return $this->hasMany('App\Models\Inventaire');
    }
}
