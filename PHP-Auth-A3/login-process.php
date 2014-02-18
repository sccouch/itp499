<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/11/14
 * Time: 6:48 PM
 */

require __DIR__ . '/vendor/autoload.php';

use ITP\Auth;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

$request = Request::createFromGlobals();

$session = new Session();
$session->start();

if (!is_null($session->get("username"))) {
    $response = new RedirectResponse("dashboard.php");
    return $response->send();
}

$username = $request->get("username");
$password = $request->get("password");

if (is_null($username) || is_null($password)) {
    $response = new RedirectResponse("login.php");
    return $response->send();
}

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$auth = new Auth($pdo);

if ($auth->attempt($username, $password)) {
    $session->set('username', $username);
    $session->set('email', $auth->getUser($username)["email"]);
    $session->set('loginTime', time());
    $session->getFlashBag()->set("flashMessage", "You have successfully logged in!");

    //$session->set('pdo', $pdo);
    $response = new RedirectResponse("dashboard.php");
    return $response->send();
}
else {
    $session->getFlashBag()->set("flashMessage", "Incorrect credentials.");
    $response = new RedirectResponse("login.php");
    return $response->send();
}