<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    protected $table = 'user_balance';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
}
