<?php
$keys = json_decode(file_get_contents("data/keys.json"));

$page = "parametres";
$title = "Paramètres";

include_once("header.php");
?>
<body>
	
	<div class="container">

		<?php include_once("menu.php"); ?>

		<form role="form" method="post" action="exec/saveKeys.php">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Mailchimp</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="apiMailchimp">Clès API Mailchimp</label>
						<input type="text" class="form-control" id="apiMailchimp" name="apiMailchimp" placeholder="Enter API key" value="<?=$keys->mailchimp?>">
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Mon AE</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="emailMonae">Email</label>
						<input type="text" class="form-control" id="emailMonae" name="emailMonae" placeholder="Email Monae" value="<?=$keys->monae->emailMonae?>">
					</div>
					<div class="form-group">
						<label for="firmID">Firm ID</label>
						<input type="text" class="form-control" id="firmID" name="firmID" placeholder="firmID Monae" value="<?=$keys->monae->firmID?>">
					</div>
					<div class="form-group">
						<label for="login">Login</label>
						<input type="text" class="form-control" id="login" name="login" placeholder="login Monae" value="<?=$keys->monae->login?>">
					</div>
					<div class="form-group">
						<label for="passwordMonae">Mot de passe</label>
						<input type="text" class="form-control" id="passwordMonae" name="passwordMonae" placeholder="Mot de passe Monae" value="<?=$keys->monae->passwordMonae?>">
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-default">Enregistrer</button>
		</form>

		<?php if(!empty($keys->mailchimp)) {

			require_once("lib/Mailchimp.php");

			try {
				
				$mailchimp = new Mailchimp($keys->mailchimp);
				$mailchimp_lists = new Mailchimp_Lists($mailchimp);

				$lists = $mailchimp_lists->getList();

				$selectList = json_decode(file_get_contents("data/mailchimp.json"));

			} catch(Mailchimp_Error $e) {
				print_r($e);
			}
			?>
			<br><br>
			<form role="form" method="post" action="exec/saveList.php">
				<div class="form-group">
					<label for="listID">Choix de la liste Mailchimp à utiliser</label>
					<select name="listID" id="listID" class="form-control">
						<?php foreach ($lists["data"] as $key => $list) { ?>
						<option <?php if($list['id'] == $selectList->listID) { echo "selected"; } ?> value="<?=$list['id']?>"><?=$list['name']?></option>
						<?php } ?>
					</select>
				</div>

				<button type="submit" class="btn btn-default">Enregistrer</button>
			</form>
			<?php } ?>
<?php include_once("footer.php"); ?>