<?php

include '../classes/User.php';

//create an obj
$user = new User;

//Call the method
$user->login($_POST);

?>