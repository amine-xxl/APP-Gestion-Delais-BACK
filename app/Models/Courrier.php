<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $fillable = [
        'n_garde',
        'date_garde',
        'sujet',
        'date_recu',
        'limite_recu',
        'delais_recu',
        'reponse',
        'n_reponse',
        'date_reponse',
        'priority',
        'status',
        'reminder_sent',
    ];

    protected $casts = [
    'date_garde'   => 'date:Y-m-d',
    'date_recu'    => 'date:Y-m-d',
    'limite_recu'  => 'date:Y-m-d',
    'date_reponse' => 'date:Y-m-d',
    'reminder_sent' => 'boolean',
];
}
