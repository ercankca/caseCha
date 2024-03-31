<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    protected $fillable = ['id','name', 'description', 'price', 'start_date', 'end_date'];

    protected $dates = ['start_date', 'end_date'];
}
