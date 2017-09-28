<?php

use Symfony\Component\HttpFoundation\Request;

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__.'/../app/autoload.php';
if (PHP_VERSION_ID < 70000) {
<<<<<<< HEAD
  include_once __DIR__.'/../var/bootstrap.php.cache';
}
$kernel = new AppKernel('prod', true);
if (PHP_VERSION_ID < 70000) {
  $kernel->loadClassCache();
=======
    include_once __DIR__.'/../var/bootstrap.php.cache';
}

$kernel = new AppKernel('prod', true);
if (PHP_VERSION_ID < 70000) {
    $kernel->loadClassCache();
>>>>>>> 8ad394b0b7dc955825b0d38ca383af8ce0623624
}
//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
