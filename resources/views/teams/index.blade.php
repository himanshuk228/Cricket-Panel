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
          <td>Name</td>
          <td>Logo Url</td>
          <td>State Club</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
        <tr>
            <td>{{$team->team_id}}</td>
            <td><a href="{{ route('players.show', $team->team_id)}}">{{$team->name}}</a></td>
            <td><img src="{{$team->logo_url}}" height="50px" width="50px"></img></td>
            <td>{{$team->state_club}}</td>
            <td class="text-center">
                <a href="{{ route('teams.edit', $team->team_id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('teams.destroy', $team->team_id)}}" method="post" style="display: inline-block">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this team?');" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection