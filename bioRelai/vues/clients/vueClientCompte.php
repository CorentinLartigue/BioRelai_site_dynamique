<div class="contentCompte">
    <header>
        <?php include 'vues/vueHaut.php' ;?>
    </header>
    <main>
        <div class='compte'>
            <h1>Vos informations</h1>
            <?php
                $formCompte->afficherFormulaire();
            ?>
        </div>
    </main>
    <footer>
        <?php include 'vues/vueBas.php' ;?>
    </footer>
</div>
