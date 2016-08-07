<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends \Eloquent
{
    protected $fillable = ['raison', 'debut', 'fin', 'type'];
}
