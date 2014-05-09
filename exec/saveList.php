<?php

$keys = json_decode(file_get_contents("../data/mailchimp.json"));

$keys->listID = $_POST["listID"];

$new_json = json_encode($keys);

unlink('../data/mailchimp.json');
$monfichier = fopen('../data/mailchimp.json', 'w+');
fwrite($monfichier, $new_json); 
fclose($monfichier);

header("Location: ../show.php");
?>