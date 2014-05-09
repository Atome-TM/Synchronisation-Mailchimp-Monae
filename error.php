<?php
$errors = array(
	"Vous devez au moins renseigner l'email pour synchroniser sur mailchimp !",
	"Vous n'avez renseigné aucun champs !"
);

$page = "erreur";
$title = "Erreur";

include_once("header.php");
?>
<body>
	
	<div class="container">

		<?php include_once("menu.php"); ?>

		<h1>Erreur</h1>
		
		<p class="bg-danger">
			<?=$errors[$_GET["e"]]?>
		</p>
<?php include_once("footer.php"); ?>