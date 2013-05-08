<?php

use lithium\core\Libraries;
use lithium\action\Response;
use lithium\net\http\Media;
use lithium\net\http\Router;

Router::connect('/', array(), function($request) {
	$content = file_get_contents(LITHIUM_APP_PATH . '/home.html');
	$url = Router::match('/', $request, array('absolute' => true));
	return new Response(array('body' => str_replace('#url#', $url, $content)));
});

Router::connect('/save', array('http:method' => "POST"), function($request) {
	include LITHIUM_APP_PATH . '/models/Users.php';
	$user = Users::create();
	$success = $user->save($request->data);
	$user = $user->data();
	$response = new Response(array('type' => 'json'));
	return Media::render($response, compact('user', 'success'));
});

Router::connect('/{:args}', array(), function($request) {
	$url = Router::match('/', $request, array('absolute' => true));
	return new Response(array('location' => $url));
});
