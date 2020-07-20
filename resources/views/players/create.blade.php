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
    Add Player
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
      <form method="post" action="{{ route('players.store') }}">
          <div class="form-group">
          {{ csrf_field() }}
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" required name="first_name"/>
          </div>
          <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" required name="last_name"/>
          </div>
          <div class="form-group">
              <label for="image_name">Image Url</label>
              <input type="url" class="form-control" required name="image_name"/>
          </div>
          <div class="form-group">
              <label for="logo_url">Select Team</label>
              <select class="form-control" required name="team_id">
              <option value="">Select</value>
              @foreach ($teams as $team)
              <option value="{{ $team->team_id }}">{{ $team->name }}</value>
              @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="player_jursey_number">Player Jursey Number</label>
              <input type="number" class="form-control" required name="player_jursey_number"/>
          </div>
          <div class="form-group">
              <label for="country">Country</label>
              <input type="text" class="form-control" required name="country"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Add Player</button>
      </form>
  </div>
</div>
@endsection