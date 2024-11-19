<div class="conteneur">
	<header>
		<?php include 'vues/vueHaut.php' ;?>
	</header>
	<main>
		<div class='Accueil'>
			<h1><span>Présentation de BioRelai</span></h1>
			<p>Bio-Relai est une entreprise sociale et collaborative qui a pour objectif la vente en circuit court de produits issus de l’agriculture biologique.</p>
			<p>Bio-Relai s'engage à mettre en relation ses adhérents avec des producteurs locaux qu'il a sélectionnés et à faciliter la vente de produits issus de l'agriculture biologique de proximité.</p>
			<h2 class="titreProducteurs">Les producteurs de notre region:</h2>
            <aside>
                <nav>
                    <?php
                        echo $leMenuProducteur;
                    ?>
                </nav>
            </aside>
            <section id='lesProducteurs'>
                <?php
                    $formProducteur->afficherFormulaire();
                ?>
            </section>
        </div>
	</main>
	<footer>
		<?php include 'vues/vueBas.php' ;?>
	</footer>
</div>