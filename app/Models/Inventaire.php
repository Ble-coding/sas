<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaire extends Model
{
    use HasFactory;

    protected $table = 'inventaires';

    protected $attributes = [
        'status' => 0,
    ];

    protected $fillable = [
        'nomcoord',
        'nomusager',
        'status',
        'contactusager',
        'dateinv',
        'immatricule',
        'lieuenlev',
        'marque',
        'genre',
        'panne',
        // 'avance',
        'prix',
        'parc_id',
        'user_id',
        'operation_id',
    //    ' statut_id'
    ];

    protected static function booted() {

        static::creating(function ($inventaire) {
            $inventaire->user_id = auth()->id();
        });
    }

    public function parc(){
        return $this->belongsTo('App\Models\Parc');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function operations(){
        return $this->hasMany('App\Models\Operation');
    }

    public function statuts(){
        return $this->hasMany('App\Models\Statut');
    }

}

