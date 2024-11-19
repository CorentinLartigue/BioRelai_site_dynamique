<div class="conteneur">
	<header>
		<?php include 'vues/vueHaut.php';?>
	</header>
	<main>
		<div class="contentConnexion">
			<div class='connexion'>
				<div class='titre'>Veuillez vous connecter</div>
				<?php 
					$formConnexion->afficherFormulaire();
				?>
			</div>
		</div>
	</main>
	<footer>
		<?php include 'vues/vueBas.php';?>
	</footer>
</div>