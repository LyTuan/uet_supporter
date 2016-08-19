<?php

/*
|--------------------------------------------------------------------------
| Application Routes
| gmail: SupporterUet@gmail.com
| pass: lytuan123456789
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/email',function(){
	$data=['lytuan'];
	Mail::send('emails.welcome', $data, function ($message) {
    $message->from('supporteruet@gmail.com', 'UET-SUPPORTER');

    $message->to('lytuanwork@gmail.com')->subject('Introduction');
});
});
// Route::get('login', ['as'=>'getLogin','uses'=>'LoginController@getLogin']);

// Route::get('trangchu',['as'=>'trangchu',function(){
// 	return view('dashboard.main');
// }]);
Route::get('facebook/redirect', 'Auth\SocialController@redirectToProvider');
Route::get('facebook/callback', 'Auth\SocialController@handleProviderCallback');
Route::get('google/redirect', 'Auth\SocialController@redirectToProviderGoogle');
Route::get('google/callback', 'Auth\SocialController@handleProviderCallbackGoogle');

// Route::post('login',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
// Route::get('logout',['as'=>'getLogout','uses'=>'LoginController@getLogout']);
// Route::get('signup',['as'=>'getSignup','uses'=>'Auth\SignupController@getSignUp']);
// Route::post('signup',['as'=>'postSignup','uses'=>'Auth\SignupController@postSignUp']);
Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('LoginAPI','API\LoginAPIController');

Route::group(['middleware' => 'auth'], function () {
//     Route::get('admin/profile', ['middleware' => 'auth', function () {
    	
// 	}]);
	Route::group(['prefix'=>'uet_admin'], function(){
		Route::get('/','HomeController@index');
		Route::group(['prefix'=>'user'], function(){
			Route::get('list',['as'=>'getListUser','middleware' => 'auth', 'uses'=>'Admin\UserController@getListUser']);
			Route::get('add',['as'=>'getAddUser', 'uses'=>'Admin\UserController@getAddUser']);
			Route::get('delete/{id}',['as'=>'getUserDel', 'uses'=>'Admin\UserController@getUserDel']);
		});
		Route::group(['prefix'=>'category'], function(){
			Route::get('list',['as'=>'getListUser','middleware' => 'auth', 'uses'=>'Admin\UserController@getListUser']);
			Route::get('add',['as'=>'getAddUser', 'uses'=>'Admin\UserController@getAddUser']);
		});
		Route::group(['prefix'=>'news'], function(){
			Route::get('list',['as'=>'getListUser','middleware' => 'auth', 'uses'=>'Admin\UserController@getListUser']);
			Route::get('add',['as'=>'getAddUser', 'uses'=>'Admin\UserController@getAddUser']);
		});
	});

});

Route::get('them',function(){
	$user = new App\News;
	$user->title = 'Thong tin title';
	$user->link = 'Thong tin link';
	$user->user_id='4';
	$user->category_id='1';
	$user->save();
});
Route::get('test',function(){
	$user = App\News::where('link','/coltech/')->get()->toArray();
	if($user==null){
		echo "1";
	}else{
		foreach ($user as $key => $value) {
		echo $value['title'];
	}	
	}
	
});

Route::resource('ResetPassAPI','API\ResetPassAPIController');
