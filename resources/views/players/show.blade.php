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
          <td>ID</td>
          <td>Player Name</td>
          <td>Team Name</td>
          <td>Jursey Number</td>
          <td>Country</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($players as $player)
        <tr>
            <td>{{$player->player_id}}</td>
            <td>{{$player->first_name}} {{$player->last_name}}</td>
            <td>{{$player->name}}</td>
            <td>{{$player->player_jursey_number}}</td>
            <td>{{$player->country}}</td>
            <td class="text-center">
                <a href="{{ route('players.edit', $player->player_id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('players.destroy', $player->player_id)}}" method="post" style="display: inline-block">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this player?');" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection