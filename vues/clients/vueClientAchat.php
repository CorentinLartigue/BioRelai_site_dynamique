<div class="conteneur">
    <header>
        <?php include 'vues/vueHaut.php' ;?>
    </header>
    <main>
        <div class='Achat'>
            <h1 class="titreProduit">Les produits de notre region:</h1>
            <aside>
                <nav>
                    <?php
                        echo $leMenuProduit;
                    ?>
                </nav>
            </aside>
            <section id='lesProduits'>
                <?php
                    $formProduit->afficherFormulaire();
                ?>
            </section>
        </div>
    </main>
    <footer>
        <?php include 'vues/vueBas.php' ;?>
    </footer>
</div>
