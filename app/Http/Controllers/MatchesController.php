<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Team;
use App\Point;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::fetchAllMatches();
        return view('matches/index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('matches/create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matchData = $request->validate([
            'team1_id' => 'required|numeric',
            'team2_id' => 'required|numeric',
        ]);

        
        $match = new Match;
        $point = new Point;

        $match->team1_id = !empty($request->team1_id)?$request->team1_id:'0';
        $match->team2_id = !empty($request->team2_id)?$request->team2_id:'0';
        $match_result = !empty($request->match_result)?$request->match_result:'0';
        if($match_result=='1'){
            $match->match_status = '1';
            $match->winner_id = $match->team1_id;
            $point->team1_point='2';
            $point->team2_point='0';
        }
        if($match_result=='2'){
            $match->match_status = '1';
            $match->winner_id = $match->team2_id;
            $point->team1_point='0';
            $point->team2_point='2';
        }
        if($match_result=='3'){
            $match->match_status = '2';
            $match->winner_id = '0';
            $point->team1_point='1';
            $point->team2_point='1';
        }
        if($match_result=='4'){
            $match->match_status = '3';
            $match->winner_id = '0';
            $point->team1_point='0';
            $point->team2_point='0';
        }

        $match->save();
        $point->match_id=$match->id;
        $point->save();
        
        return redirect('/matches')->with('completed', 'Matches has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
