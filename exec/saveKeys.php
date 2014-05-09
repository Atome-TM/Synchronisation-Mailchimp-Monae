<?php

$keys = json_decode(file_get_contents("../data/keys.json"));

$keys->mailchimp = $_POST["apiMailchimp"];

$keys->monae->emailMonae = $_POST["emailMonae"];
$keys->monae->firmID = $_POST["firmID"];
$keys->monae->login = $_POST["login"];
$keys->monae->passwordMonae = $_POST["passwordMonae"];

$new_json = json_encode($keys);

unlink('../data/keys.json');
$monfichier = fopen('../data/keys.json', 'w+');
fwrite($monfichier, $new_json); 
fclose($monfichier);

header("Location: ../show.php");
?>