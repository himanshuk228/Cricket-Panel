<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::fetchAllPlayers();
        return view('players/index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('players/create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $playerData = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'image_name' => 'required|max:100',
            'team_id' => 'required|numeric',
            'player_jursey_number'=>'required|numeric',
            'country'=>'required|string|max:100',
        ]);
        
        $player = Player::create($playerData);

        return redirect('/players')->with('completed', 'Player has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $players = Player::fetchPlayersByTeam($id);
        return view('players/show', compact('players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::where('player_id', $id)->firstOrFail();
        $teams = Team::all();

        return view('players/edit', compact('teams','player'));
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
        $playerData = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'image_name' => 'required|max:100',
            'team_id' => 'required|numeric',
            'player_jursey_number'=>'required|numeric',
            'country'=>'required|string|max:100',
        ]);

        Player::where('player_id', $id)->update($playerData);
        return redirect('/players')->with('completed', 'Player detail has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::where('player_id', $id)->delete();
        
        return redirect('/players')->with('completed', 'Player has been deleted');
    }
}
