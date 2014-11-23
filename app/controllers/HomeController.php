<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{	$q = "SELECT * FROM daa80cd8-da5d-4b9d-bb6d-217a360ff7c1";
		$url = 'http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=SELECT%20*%20from%20%22539525df-fc9a-4adf-b33d-04747e95f120%22%20WHERE%20awardee%20=%20%27MYSTIC%20WATER%20PHILIPPINES,%20INC.%27%20LIMIT%2010';
		$response = file_get_contents($url);
		
		$response = $this->getContentDataAttribute($response);

		$a = $response['result']['records'];
		$i = count($a);
		return View::make('home')
		->with('a',$a)
		->with('i',$i);
	}

	public function getContentDataAttribute($data)
		{
			//$items[] = json_decode($content->content_data);
		    return json_decode($data,true);
		}

	
}
