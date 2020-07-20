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
    Edit & Update Player
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
      <form method="post" action="{{route('players.update',$player->player_id)}}">
          <div class="form-group">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" name="first_name" required value="{{ $player->first_name }}"/>
          </div>
          <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" name="last_name" required value="{{ $player->last_name }}"/>
          </div>
          <div class="form-group">
              <label for="image_name">Image Url</label>
              <input type="url" class="form-control" name="image_name" required value="{{ $player->image_name }}"/>
          </div>
          <div class="form-group">
              <label for="logo_url">Select Team</label>
              <select class="form-control" required name="team_id">
              <option value="">Select</value>
              @foreach ($teams as $team)
              <option value="{{ $team->team_id }}" <?php if($player->team_id==$team->team_id){ echo "selected";} ?>>{{ $team->name }}</value>
              @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="player_jursey_number">Player Jursey Number</label>
              <input type="number" class="form-control" required name="player_jursey_number" value="{{ $player->player_jursey_number }}"/>
          </div>
          <div class="form-group">
              <label for="country">Country</label>
              <input type="text" class="form-control" required name="country" value="{{ $player->country }}"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update Team</button>
      </form>
  </div>
</div>
@endsection