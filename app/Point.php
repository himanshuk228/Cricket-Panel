<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['team1_id','team2_id','match_status','winner_id'];
}
