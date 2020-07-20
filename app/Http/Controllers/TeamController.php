<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams/index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teamData = $request->validate([
            'name' => 'required|max:50',
            'logo_url' => 'required|max:255',
            'state_club' => 'required|max:100'
        ]);
        
        $team = Team::create($teamData);

        return redirect('/teams')->with('completed', 'Team has been created!');
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
        $team = Team::where('team_id', $id)->firstOrFail();
        return view('teams/edit', compact('team'));
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
        $teamData = $request->validate([
            'name' => 'required|max:50',
            'logo_url' => 'required|max:255',
            'state_club' => 'required|max:100'
        ]);
        Team::where('team_id', $id)->update($teamData);
        return redirect('/teams')->with('completed', 'Team has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::where('team_id', $id)->delete();
        
        return redirect('/teams')->with('completed', 'Team has been deleted');
    }
}
