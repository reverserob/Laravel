<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   // protected $table = 'custom_tasks';

    protected $fillable = [
        'title',
        'description'
    ];


}
