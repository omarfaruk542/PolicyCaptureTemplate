<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $fillable = ['name','address','po_date'];

    public function user(){
        return $this->belongsTo(User::class,'comp_id','id');
    }

}
