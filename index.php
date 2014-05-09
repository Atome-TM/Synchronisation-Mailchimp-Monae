<?php
require("lib/Mailchimp.php");
require("lib/monae.class.php");

$keys = json_decode(file_get_contents("data/keys.json"));
$selectList = json_decode(file_get_contents("data/mailchimp.json"));

try {
	$monae = new MonAE($keys->monae->emailMonae, $keys->monae->firmID, $keys->monae->login, $keys->monae->passwordMonae);

	$customers = $monae->getCustomers();
	if($customers->error->is_error) {
		echo $customers->error->code_error;
	} else {
		$customers = $customers->response;
	}

} catch(MonaeException $e) {
	header("Location: show.php");
}

$page = "accueil";
$title = "Sync Mailchimp / MonAE";

include_once("header.php");
?>
<body>
	
	<div class="container">

		<?php include_once("menu.php"); ?>

		<form action="sync.php" method="post" role="form">
			
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Choix des champs à importer</div>
				<div class="panel-body">
					<p>
						Choisissez les champs à importer dans votre liste Mailchimp. Pensez à sélectionner au minimum l'adresse email, qui est obligatoire pour mailchimp !
					</p>
				</div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Champs MonAE</th>
							<th>(Client exemple)</th>
							<th>--></th>
							<th>Champs Mailchimp</th>
						</tr>
					</thead>

					<?php
					try {

						$mailchimp = new Mailchimp($keys->mailchimp);
						$mailchimp_lists = new Mailchimp_Lists($mailchimp);

						$mergevars = $mailchimp_lists->mergeVars(array($selectList->listID));

						$mergevars = $mergevars["data"][0]["merge_vars"];

					} catch(Mailchimp_Error $e) {
						print_r($e);
					}
					?>
					<tbody>
						<?php foreach ($customers[0] as $id => $client) { ?>

						<tr>
							<td><?=$id?></td>
							<td><?=$client?></td>
							<td>--></td>
							<td>
								<select name="<?=$id?>">
									<option value="">Ne pas importer</option>
									<?php foreach ($mergevars as $key => $var) { ?>
									<option value="<?=$var['tag']?>"><?=$var["name"]?> (<?=$var["tag"]?>)</option>
									<?php } ?>
								</select>
							</td>
						</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
			
			<button type="submit" class="btn btn-success">Synchroniser</button>
			<br><br>
		</form>
<?php include_once("footer.php"); ?>