<div class="conteneur">
	<header>
		<?php include 'vues/vueHaut.php';?>
	</header>
	<main>
		<div class="contentInscription">
			<div class='inscription'>
				<div class='titre'>Veuillez vous inscrire</div>
				<?php 
					$formInscription->afficherFormulaire();
				?>
			</div>
		</div>
	</main>
	<footer>
		<?php include 'vues/vueBas.php';?>
	</footer>
</div>