<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Clientes extends Model
{
    //
    public static function date_mysql($date){
        return Carbon::parse($date)->format('Y-m-d');
    }

}
