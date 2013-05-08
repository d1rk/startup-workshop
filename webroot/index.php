<?php

use lithium\core\Libraries;
use lithium\action\Dispatcher;
use lithium\action\Request;

define('LITHIUM_LIBRARY_PATH', __DIR__ . '/libraries');

if (!include LITHIUM_LIBRARY_PATH . '/lithium/core/Libraries.php') {
	$message  = "Lithium core could not be found.  Check the value of LITHIUM_LIBRARY_PATH in ";
	$message .= __FILE__ . ".  It should point to the directory containing your ";
	$message .= "/libraries directory.";
	throw new ErrorException($message);
}

Libraries::add('lithium');

include 'routes.php';
include 'filters.php';

echo Dispatcher::run(new Request);