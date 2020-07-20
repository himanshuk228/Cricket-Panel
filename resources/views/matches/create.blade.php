@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Set Matches
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('matches.store') }}">
          <div class="form-group">
          {{ csrf_field() }}
              <label for="team1_id">Select Team1</label>
              <select class="form-control" required id="team1_id" name="team1_id">
              <option value="">Select</value>
              @foreach ($teams as $team)
              <option value="{{ $team->team_id }}">{{ $team->name }}</value>
              @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="team2_id">Select Team2</label>
              <select class="form-control" onchange="checkteam()" id="team2_id" required name="team2_id">
              <option value="">Select</value>
              @foreach ($teams as $team)
              <option value="{{ $team->team_id }}">{{ $team->name }}</value>
              @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="match_result">Match Result</label>
              <select class="form-control" required name="match_result">
              <option value="">Select</value>
              <option value="1">Team1 Winner</value>
              <option value="2">Team2 Winner</value>
              <option value="3">Match Tied</value>
              <option value="4">Cancelled</value>
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Set Match</button>
      </form>
  </div>
</div>
@endsection
<script>
function checkteam(){
var team1=$('#team1_id').val();
var team2=$('#team2_id').val();
if(team1 ==''){
  alert('Please select team1 first.');
  $('#team2_id').val('');
  return false;
}

if( team1!='' && team2!='' && (team1 == team2)){
  alert('Please select different teams.');
  $('#team2_id').val('');
  return false;
}

}
</script>