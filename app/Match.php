<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Match extends Model
{
    protected $fillable = ['team1_id','team2_id','match_status','winner_id'];

    public static function fetchAllMatches(){
        try{
            
            $players = DB::table('matches')
            ->leftjoin('points', 'matches.match_id', '=', 'points.match_id')
            ->leftjoin('teams as t1', 'matches.team1_id', '=', 't1.team_id')
            ->leftjoin('teams as t2', 'matches.team2_id', '=', 't2.team_id')
            ->select('matches.*', 'points.team1_point', 'points.team2_point', 't1.name as team1_name', 't2.name as team2_name')
            ->get();

            return $players;

        }catch(Exception $e){
              return $e->getMessage();
        }
    }
}
