<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/2/14
 * Time: 11:13 PM
 */

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);