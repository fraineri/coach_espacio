<?php 

require_once 'User.php';
require_once 'JSONUser.php';

$db = new JSONUser("hola.json");
echo "<pre>";
var_dump($db);

$u = new User($db);
$u->setNombre("lu");
$u->setApellido("cia");
$u->setEmail("lu@ciarra");
$u->setUsername("luuciarra");
$u->setPassword("hola");

var_dump($u);

$u->save();