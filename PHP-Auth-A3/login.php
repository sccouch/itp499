<?php

require __DIR__ . "/vendor/autoload.php";

use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();

if (!is_null($session->get("username"))) {
    $response = new RedirectResponse("dashboard.php");
    return $response->send();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Song Database Login</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <link href="styles.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <form class="form-signin" role="form" method="post" action="login-process.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div>


</body>
</html>