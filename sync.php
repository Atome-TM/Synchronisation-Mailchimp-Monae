<?php
foreach ($_POST as $key => $value) {
	if(empty($value)) {
		unset($_POST[$key]);
	}
}

if(empty($_POST["EMAIL"]) OR !isset($_POST["EMAIL"])) {
	header("Location: error.php?e=0");
}
if(empty($_POST)){

	header("Location: error.php?e=1");
}

require("lib/Mailchimp.php");
require("lib/monae.class.php");

$keys = json_decode(file_get_contents("data/keys.json"));
$selectList = json_decode(file_get_contents("data/mailchimp.json"));

$mailchimp = null;
$mailchimp_lists = null;
try {

	$mailchimp = new Mailchimp($keys->mailchimp);
	$mailchimp_lists = new Mailchimp_Lists($mailchimp);

} catch(Mailchimp_Error $e) {
	print_r($e);
}

try {
	$monae = new MonAE($keys->monae->emailMonae, $keys->monae->firmID, $keys->monae->login, $keys->monae->passwordMonae);

	$customers = $monae->getCustomers();
	if($customers->error->is_error) {
		echo $customers->error->code_error;
	} else {
		$customers = $customers->response;
	}

	foreach ($customers as $key => $client) {
		
		$tab_customer = array();
		
		foreach ($_POST as $id => $value) {
			$tab_customer[$value] = $client->$id;
		}

		$email = $tab_customer["EMAIL"];
		unset($tab_customer["EMAIL"]);
		
		try {
			$retour = $mailchimp_lists->subscribe($selectList->listID, array("email" => $email), $tab_customer, "html", false, true, true, false);
		} catch (Mailchimp_Error $e) {
			print_r($e);
		}
	}

} catch(MonaeException $e) {
	echo $e->getMessage();
}

header("Location: success.php");
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Loading...</title>
	<style>
		body {
			text-align: center;
		}
	</style>
</head>
<body>
	<img src="ressources/ajax-load.gif" alt="">
</body>
</html>