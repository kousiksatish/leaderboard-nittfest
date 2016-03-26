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
	try
	{
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
	    foreach ($points as $point)
	    {
	    	$depts[$point->dept] = 1;
	    }
	    foreach($depts as $key=>$value)
	    {
	    	if($value==0)
	    	{
	    		$pts = new stdClass();
	    		$pts->dept = $key;
	    		$pts->points = number_format(0,2);
	    		array_push($points, $pts);

	    	}
	    }
	    return response()->json(['status' => '200', 'data' => $points]);
	}
	catch(\Exception $e)
	{
		return response()->json(['status' => '101', 'data' => 'Error']);
	}

	
});
