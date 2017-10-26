<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

include_once('ManagerMessages.php');
include_once('Messages.php');


$messages = new Messages();

$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$manager = new ManagerMessages($bdd);
  
$manager->add($messages);

$messages = $manager->getList();


include('index.php');
?>