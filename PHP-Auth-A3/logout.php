<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/11/14
 * Time: 6:48 PM
 */

require __DIR__ . "/vendor/autoload.php";

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->invalidate();

$response = new RedirectResponse("login.php");
return $response->send();