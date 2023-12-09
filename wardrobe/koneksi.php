<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', ''); // Ganti dengan password MySQL Anda jika ada
define('DATABASE', 'wardrobe');

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}