<?php
//Application Configurations

$app_id		= "663630510342293";

$app_secret	= "f6721c3a2c2487594ccea17bce0fa992";

$site_url	= "http://scribzoo.com/scrib/social/php/admin/fbconnect.php";


require "src/facebook.php";

try{

	//include_once "src/facebook.php";


}catch(Exception $e){

	error_log($e);

}

// Create our application instance

$facebook = new Facebook(array(

	'appId'		=> $app_id,

	'secret'	=> $app_secret,

));

//rahuls code to get access token



// Get User ID
try {
	$user = $facebook->getUser();
} catch (FacebookApiException $e) {
	print_r($e);
}

// We may or may not have this data based

// on whether the user is logged in.

// If we have a $user id here, it means we know

// the user is logged into

// Facebook, but we don’t know if the access token is valid. An access

// token is invalid if the user logged out of Facebook.

//echo $user;

if($user){

	//==================== Single query method ======================================

	try{

		// Proceed knowing you have a logged in user who's authenticated.

		$user_profile = $facebook->api('/me');

	}catch(FacebookApiException $e){

		error_log($e);

		$user = NULL;

	}

	//==================== Single query method ends =================================

}



if($user){

	// Get logout URL

	$logoutUrl = $facebook->getLogoutUrl();

}else{

	// Get login URL

	$loginUrl = $facebook->getLoginUrl(array(

		'scope'		=> 'email',

		'redirect_uri'	=> $site_url,

	));

}



if($user){

	// Proceed knowing you have a logged in user who has a valid session.



	//========= Batch requests over the Facebook Graph API using the PHP-SDK ========

	// Save your method calls into an array

	$queries = array(

	array('method' => 'GET', 'relative_url' => '/'.$user),

	array('method' => 'GET', 'relative_url' => '/'.$user.'/home?limit=50'),

	array('method' => 'GET', 'relative_url' => '/'.$user.'/friends'),

	array('method' => 'GET', 'relative_url' => '/'.$user.'/photos?limit=6'),

	);



	// POST your queries to the batch endpoint on the graph.

	try{

		$batchResponse = $facebook->api('?batch='.json_encode($queries), 'POST');

	}catch(Exception $o){

		error_log($o);

	}



	//Return values are indexed in order of the original array, content is in ['body'] as a JSON

	//string. Decode for use as a PHP array.

	$user_info		= json_decode($batchResponse[0]['body'], TRUE);

	$feed			= json_decode($batchResponse[1]['body'], TRUE);

	$friends_list		= json_decode($batchResponse[2]['body'], TRUE);

	$photos			= json_decode($batchResponse[3]['body'], TRUE);

	//========= Batch requests over the Facebook Graph API using the PHP-SDK ends =====



	// Update user's status using graph api

	if(isset($_POST['pub'])){

		try{

			$publishStream = $facebook->api("/$user/feed", 'post', array(

				'message'		=> 'Check Out Scribzoo',

				'link'			=> 'http://scribzoo.com',

				'picture'		=> 'http://scribzoo.com/logo.png',

				'name'			=> 'Scribzoo',

				'caption'		=> 'scribzoo.com',

				'description'		=> 'I have just wrote a testimonial for a friend',

			));

		}catch(FacebookApiException $e){

			error_log($e);

		}

	}



	// Update user's status using graph api

	if(isset($_POST['status'])){

		try{

			$statusUpdate = $facebook->api("/$user/feed", 'post', array('message'=> $_POST['status']));

		}catch(FacebookApiException $e){

			error_log($e);

		}

	}

}

?>