<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'com_id',
        'added_by',
        'updated_by'
    ];
}
