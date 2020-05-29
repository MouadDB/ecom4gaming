<?php

require_once '../config.php';

Auth::check();


require_once '_html_header.php';
require_once '_header.php';

$home = new AdminHome();


?>

<section class="home mt-5">
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-body">
                    <h2 class="card-title font-weight-normal"><?= $home->get_sales() ?>€</h2>
                    <h4 class="card-subtitle mb-2 card-title font-weight-normal">Le chiffre d'affaires</h4>
                    <a href="./orders.php" class="card-link">Voir les commandes</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-success">
                <div class="card-body">
                    <h2 class="card-title font-weight-normal"><?= $home->get_orders() ?></h2>
                    <h4 class="card-subtitle mb-2 card-title font-weight-normal">Commandes</h4>
                    <a href="./orders.php" class="card-link">Voir les commandes</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-danger">
                <div class="card-body">
                    <h2 class="card-title font-weight-normal"><?= $home->get_products() ?></h2>
                    <h4 class="card-subtitle mb-2 card-title font-weight-normal">Produits</h4>
                    <a href="./products.php" class="card-link">Voir les produits</a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

require_once '_footer.php';