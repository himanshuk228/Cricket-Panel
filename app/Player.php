<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Player extends Model
{
    protected $fillable = ['first_name','last_name','image_name','team_id','player_jursey_number','country'];

    public static function fetchAllPlayers(){
        try{
            
            $players = DB::table('players')
            ->leftjoin('teams', 'teams.team_id', '=', 'players.team_id')
            ->select('players.*', 'teams.name')
            ->get();

            return $players;

        }catch(Exception $e){
              return $e->getMessage();
        }
    }

    public static function fetchPlayersByTeam($team_id = null){
        try{
            
            $players = DB::table('players')
            ->leftjoin('teams', 'teams.team_id', '=', 'players.team_id')
            ->select('players.*', 'teams.name')
            ->where('players.team_id', $team_id)
            ->get();

            return $players;

        }catch(Exception $e){
              return $e->getMessage();
        }
    }
}
