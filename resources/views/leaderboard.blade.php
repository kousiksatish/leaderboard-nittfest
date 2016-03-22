<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{{asset("bootstrap.min.css")}}" />
		<title>NITTFEST 16 LeaderBoard</title>
		<style>
		.leaderboard-row
		{
			box-sizing: border-box;
			min-height: 9%;
			background-color:rgba(255,255,255,0.1);
			margin-bottom:0.5%;
			margin-right:0.25%;
			margin-left:0.25%;
			font-size:18px;
			font-weight:500;
			float : left;
			display: flex;
			justify-content: center;
			align-items: center; 
			opacity:0.8;
		}
		.leaderboard-header
		{
			background-color:rgba(13,227,192,0.25);
		}
		.leaderboard-leader1
		{
			color:rgba(255,215,0,1);
		}
		.leaderboard-leader2
		{
			color:rgba(192,192,192,1);
		}
		.leaderboard-leader3
		{
			color:rgba(205,127,50,1);
		}
		.leaderboard-currentuser
		{
			background-color:rgba(52,152,219,0.2);
		}
		.rank-grid
		{
			width:20%;
		}
		.score-grid
		{
			width:20%;
		}
		.name-grid
		{

			width:54%;
		}

		</style>
	</head>
	<body>
		<br><br>
		<div class="container">
			<center><h1 class="text-info">NITTFEST '16 - Leaderboard</h1></center>
			<br><br>
			<div class="row">
				@yield('content')
			</div>
		</div>
	</body>
	<footer class="footer">
		<center><h3 class="text-info">Made with &hearts; by <a href="http://delta.nitt.edu/">Delta Force</a></h1></center>
	</footer>
</html>
