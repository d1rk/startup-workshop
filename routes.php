<?php

use lithium\core\Libraries;
use lithium\action\Response;
use lithium\net\http\Router;

Router::connect('/', array(), function($request) {
	$url = Router::match('/', $request, array('absolute' => true));
	return new Response(array('body' => str_replace('#url#', $url, file_get_contents('home.html'))));
});

Router::connect('/', array('http:method' => "POST"), function($request) {
	include 'models/Users.php';
	$user = Users::create();
	$success = $user->save($request->data);
	return new Response(array('type' => 'json', 'body' => compact('user', 'success')));
});

Router::connect('/{:args}', array(), function($request) {
	$url = Router::match('/', $request, array('absolute' => true));
	return new Response(array('location' => $url));
});
