<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $fillable = ['name','address','po_date'];
}
