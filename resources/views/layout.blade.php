<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Laravel Cricket App</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container">
            <a class="navbar-brand" href="{{ route('teams.index')}}">Content List</a>
            <div class="navbar-nav">
               <a class="nav-item nav-link active" href="{{ route('teams.index')}}">Team List</a>
               <a class="nav-item nav-link" href="{{ route('teams.create')}}">Create Team</a>
               <a class="nav-item nav-link" href="{{ route('players.create')}}">Add Player</a>
               <a class="nav-item nav-link" href="{{ route('matches.create')}}">Set Match</a>
               <a class="nav-item nav-link" href="{{ route('matches.index')}}">Match List</a>
            </div>
         </div>
       </nav>

      <div class="container">
         @yield('content')
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
   </body>
</html>