<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/11/14
 * Time: 6:48 PM
 */

require __DIR__ . "/vendor/autoload.php";

use Carbon\Carbon;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();

if (is_null($session->get("username"))) {
    $response = new RedirectResponse("login.php");
    return $response->send();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title class="text-center">Dashboard</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Music Database</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                $loginTime = Carbon::createFromTimestamp($session->get("loginTime"))->diffForHumans();
                echo " <li><span class='navbar-text'>{$session->get("username")}</span></li>";
                echo " <li><span class='navbar-text'>{$session->get("email")}</span></li>";
                echo " <li><span class='navbar-text'>Last Login: {$loginTime}</span></li>";
                ?>
                <li><a href="logout.php">Logout</a> </li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
            <?php
            $message = $session->getFlashBag()->get("flashMessage");
            if (count($message) > 0)
                echo "</br> </br></br> </br><div class='alert alert-success text-center'>$message[0]</div>";
            ?>
    </div>
    <div class="row">
        </br> </br> </br> </br>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Genre</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $host = 'itp460.usc.edu';
            $dbname = 'music';
            $user = 'student';
            $pass = 'ttrojan';

            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);


            $songQuery = new ITP\Songs\SongQuery($pdo);
            $songs = $songQuery
                ->withArtist()
                ->withGenre()
                ->orderBy('title')
                ->all();

            foreach($songs as $song) {
                echo "<tr>
                        <td>{$song['title']}</td>
                        <td>{$song['artist_name']}</td>
                        <td>{$song['genre']}</td>
                        <td>{$song['price']}</td>
                     </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>