<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   // protected $table = 'custom_tasks';

    protected $fillable = [
        'n_prenotazione',
        'data_ora',
        'nome',
        'cognome',
        'visita',
        'medicazione',
        'sala_gessi',
        'rx_prima',
        'rx_dopo',
        'prenotato_da'

    ];


}
