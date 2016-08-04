<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = ['raison', 'debut', 'fin', 'type'];
}
