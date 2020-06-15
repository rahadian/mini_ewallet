<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopupHistory extends Model
{
    protected $table = 'user_balance_history';
    public $timestamps = false;
}
