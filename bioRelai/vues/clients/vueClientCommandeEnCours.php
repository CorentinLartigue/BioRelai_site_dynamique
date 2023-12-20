<div class="contentCommande">
    <header>
        <?php include 'vues/vueHaut.php' ;?>
    </header>
    <main>
        <div class='Commande'>
            <h1>Vos Commandes en cours:</h1>
            <aside>
                <nav>
                    <?php
                        echo $leMenuCommandeEnCours;
                    ?>
                </nav>
            </aside>
            <section id='lesCommandes'>
                <?php
                $formCommandeEnCours->afficherFormulaire();
                ?>
            </section>
        </div>
    </main>
    <footer>
        <?php include 'vues/vueBas.php' ;?>
    </footer>
</div>