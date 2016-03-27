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
    $depts = DB::table('pragyanV3_users')
    		->where('user_id', '>', '10000')
    		->where('user_id', '<', '10013')
    		->lists('user_name');
   	$depts = array_fill_keys($depts, 0);
   	//return $depts;
    $rank = 0;
    $oldpoints = -1;
    $idx = 1;
    foreach ($points as $point)
    {
    	if($oldpoints!=$point->points)
    	{
    		$rank+=$idx;
    		$idx = 1;
    	}
    	else
    		$idx++;
    	$point->rank = $rank;
    	$depts[$point->dept] = 1;
    	$oldpoints = $point->points;
    }
    foreach($depts as $key=>$value)
    {
    	if($value==0)
    	{
    		$pts = new stdClass();
    		$pts->rank = $rank+$idx;
    		$pts->dept = $key;
    		$pts->points = number_format(0,2);
    		array_push($points, $pts);

    	}
    }
    /* CLUSTER WISE LEADERBOARD */
    /*
    $clusters = DB::table('complete_leaderboard')
        ->select('eventcluster')
        ->groupBy('eventcluster')
        ->lists('eventcluster');
    $cluster_points = [];
    foreach($clusters as $cluster)
    {
    	$cluster_details = DB::table('complete_leaderboard')
	        ->select('dept', DB::raw('SUM(points) as points'))
	        ->where('eventcluster', $cluster)
	        ->groupBy('dept')
	        ->orderBy('points', 'desc')
	        ->get();
	    $rank = 0;
	    $oldpoints = -1;
	    $idx = 1;
	    foreach ($cluster_details as $point)
	    {
	    	if($oldpoints!=$point->points)
	    	{
	    		$rank+=$idx;
	    		$idx = 1;
	    	}
	    	else
	    		$idx++;
	    	$point->rank = $rank;
	    	$oldpoints = $point->points;
	    }
	    $cluster_points[$cluster] = $cluster_details;
    }

    // return $points;
    // return $cluster_points;
	return view('content', compact(array('points', 'cluster_points')));
    */

    return view('content-withoutcluster', compact('points'));
});
