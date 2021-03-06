@extends('leaderboard')

@section('content')
	<div class="row">
	<div class="leaderboard-row leaderboard-header rank-grid">Position</div>
	<div class="leaderboard-row leaderboard-header name-grid">Department</div>
	<div class="leaderboard-row leaderboard-header score-grid">Score</div>
	</div>
	@foreach($points as $highScore)
				<div class="row
				@if($highScore->rank == 1)
					leaderboard-leader1
				@endif
				@if($highScore->rank == 2)
					leaderboard-leader2
				@endif
				@if($highScore->rank == 3)
					leaderboard-leader3
				@endif">
				<div class="leaderboard-row rank-grid">{{  $highScore->rank  }}</div>
				<div class="leaderboard-row name-grid ">{!!  strtoupper($highScore->dept) !!}</div>
				<div class="leaderboard-row score-grid">{{  $highScore->points }}</div>
				</div>
	@endforeach
	<center><h2 class="text-info"><u>Cluster wise leaderboard</u></h1></center>
	@foreach($cluster_points as $key=>$value)
	<center><h3 class="text-info">{{$key}}</h1></center>
	<div class="row">
	<div class="leaderboard-row leaderboard-header rank-grid">Position</div>
	<div class="leaderboard-row leaderboard-header name-grid">Department</div>
	<div class="leaderboard-row leaderboard-header score-grid">Score</div>
	</div>
	@foreach($value as $highScore)
				<div class="row
				@if($highScore->rank == 1)
					leaderboard-leader1
				@endif
				@if($highScore->rank == 2)
					leaderboard-leader2
				@endif
				@if($highScore->rank == 3)
					leaderboard-leader3
				@endif">
				<div class="leaderboard-row rank-grid">{{  $highScore->rank  }}</div>
				<div class="leaderboard-row name-grid ">{!!  strtoupper($highScore->dept) !!}</div>
				<div class="leaderboard-row score-grid">{{  $highScore->points }}</div>
				</div>
	@endforeach
	@endforeach
	
@stop