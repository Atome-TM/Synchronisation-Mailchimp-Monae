<!-- Static navbar -->
<div class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?php echo $page == 'accueil' ?  'class="active"' : ''; ?>><a href="<?=RACINE?>/index.php">Accueil</a></li>
				<li <?php echo $page == 'parametres' ?  'class="active"' : ''; ?>><a href="<?=RACINE?>/show.php">Paramètres</a></li>						
			</ul>
		</div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
</div>