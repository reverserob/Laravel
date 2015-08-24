<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class Overbooking extends Model
{
    // protected $over = 'overbooking';

    public function getDataAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }


    protected $fillable = [
        'n_prenotazione',
        'data',
        'telefono',
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
