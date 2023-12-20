<div class="contentCommande">
    <header>
        <?php include 'vues/vueHaut.php' ;?>
    </header>
    <main>
        <div class='Commande'>
            <h1>Vos Commandes Validées:</h1>
            <aside>
                <nav>
                    <?php
                    echo $leMenuCommandeValider;
                    ?>
                </nav>
            </aside>
            <section id='lesCommandes'>
                <?php
                $formCommandeValider->afficherFormulaire();
                ?>
            </section>
        </div>
    </main>
    <footer>
        <?php include 'vues/vueBas.php' ;?>
    </footer>
</div>