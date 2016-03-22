<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Leaderboard as Leaderboard;
Route::get('/', function () {
	$points = DB::table('complete_leaderboard')
        ->select('dept', DB::raw('SUM(points) as points'))
        ->groupBy('dept')
        ->orderBy('points', 'desc')
        ->get();
    $rank = 0;
    $oldpoints = -1;
    foreach ($points as $point)
    {
    	if($oldpoints!=$point->points)
    		$rank++;
    	$point->rank = $rank;
    	$oldpoints = $point->points;
    }
	return view('content', compact('points'));
});
