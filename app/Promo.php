<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\test;
class Promo extends Model
{
    //
    function exemple(){
        $cat = new test(10,2);
        $cat.$prix = 15;

    }

}
