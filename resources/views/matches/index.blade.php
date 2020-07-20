@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Match ID</td>
          <td>Team1</td>
          <td>Team2</td>
          <td>Team1 Point</td>
          <td>Team2 Point</td>
          <td>Match Result</td>
        </tr>
    </thead>
    <tbody>
        @foreach($matches as $match)
        <tr>
            <td>{{$match->match_id}}</td>
            <td>{{$match->team1_name}}</td>
            <td>{{$match->team2_name}}</td>
            <td>{{$match->team1_point}}</td>
            <td>{{$match->team2_point}}</td>
            @if($match->match_status=='1' && $match->winner_id==$match->team1_id)
            <td>Team 1 wins</td>
            @elseif($match->match_status=='1' && $match->winner_id==$match->team2_id)
            <td>Team 2 wins</td>
            @elseif($match->match_status=='2')
            <td>Match Tie</td>
            @else
            <td>Match Cancelled</td>
            @endif
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection