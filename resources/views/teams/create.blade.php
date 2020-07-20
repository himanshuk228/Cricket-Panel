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
    Add Team
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
      <form method="post" action="{{ route('teams.store') }}">
          <div class="form-group">
          {{ csrf_field() }}
              <label for="name">Name</label>
              <input type="text" class="form-control" required name="name"/>
          </div>
          <div class="form-group">
              <label for="logo_url">Logo Url</label>
              <input type="url" class="form-control" required name="logo_url"/>
          </div>
          <div class="form-group">
              <label for="state_club">State Club</label>
              <input type="text" class="form-control" required name="state_club"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create Team</button>
      </form>
  </div>
</div>
@endsection