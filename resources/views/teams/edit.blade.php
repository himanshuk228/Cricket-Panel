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
    Edit & Update
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
      <form method="post" action="{{route('teams.update',$team->team_id)}}">
          <div class="form-group">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" required value="{{ $team->name }}"/>
          </div>
          <div class="form-group">
              <label for="logo_url">Logo Url</label>
              <input type="url" class="form-control" name="logo_url" required value="{{ $team->logo_url }}"/>
          </div>
          <div class="form-group">
              <label for="state_club">State Club</label>
              <input type="tel" class="form-control" name="state_club" required value="{{ $team->state_club }}"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update Team</button>
      </form>
  </div>
</div>
@endsection