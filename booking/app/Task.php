<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // protected $task = 'prenotazioni';

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
