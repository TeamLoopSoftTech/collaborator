<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/accounts', array(
	'as'=>'accounts',
	'uses'=>'BlogController@showPosts'
	));
Route::get('/', array(
	'as'=>'home',
	'uses'=>'HomeController@showWelcome'
	));
Route::get('/bid-item/page/{page}',array(
	'as'	=>'bid-item',
	'uses'	=>'CategoryController@category'
	));

Route::get('/bid-item/info/{ref_id}',array(
	'as'	=>'bid-item-info',
	'uses'	=>'CategoryController@iteminfo'
	));
Route::get('/sms-alert', array(
	'as'=>'sms-alert',
	'uses'=>'SmsController@showSms'
	));

Route::get('/SMS/{code}', array(
    'as'=>'SMS',
    'uses'=>'SmsController@SMS'
));

Route::get('/sms-alert/response', array(
    'as'=>'sms-alert-response',
    'uses'=>'SmsController@showSmsresponse'
));
 /*
/UnauthenticatedGroup
*/
Route::group(array('before'=>'guest'),function(){


	/*
	/CSRF protection group
	*/

	Route::group(array('before'=>'csrf'),function(){
		

		Route::post('/bid-item/page',array(
		'as'	=>'post-bid-item',
		'uses'	=>'CategoryController@Ajaxcategorysearch'
		));

	});

	Route::post('/bid-item/bid',array(
		'as'	=>'post-bid',
		'uses'	=>'CategoryController@postpostbid'
		));


});