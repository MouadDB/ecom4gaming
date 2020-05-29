<?php

require_once '../config.php';

Auth::check();

require_once '_html_header.php';
require_once '_header.php';

$products = new Products();

$all_products = $products->get_all_products();

$categories = new Categories();

$cats_names = $categories->get_names();

?>

<section class="home mt-5">
  <div class="row ">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables" class="float-left">Les Produits</h1>
        <button class="btn btn-outline-secondary float-right" data-toggle="modal" data-target="#add_db"><i
            class="fa fa-plus"></i> Ajouter une table</button>
      </div>
      <table class="table table-hover border">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Categories</th>
            <th>Thumbnail</th>
            <th>Price</th>
            <th>Quantity</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>

          <?php

          foreach ($all_products as $product) {
            $category_name = [];
            $cats_ids = explode(",", $product['categories']);
            foreach ($cats_ids as $cat_id) {
              $category_name[] = (isset($cats_names[$cat_id])) ? $cats_names[$cat_id] : '';
            }
          ?>
          <tr>
            <td><strong><?=$product['id']?></strong></td>
            <td><?=$product['name']?></td>
            <td><?=join(", ", $category_name)?></td>
            <td><img src="<?=$product['thumbnail']?>" alt=""></td>
            <td><?=$product['price']?></td>
            <td><?=$product['quantity']?></td>
            </td>
            <td>

              <a href="./show_tables.php?db=<?php echo $table; ?>" class="btn btn-outline-success"><i
                  class="fa fa-edit"></i> Modifier</a>
              <a href="./show_tables.php?db=<?php echo $table; ?>" class="btn btn-outline-primary"><i
                  class="fa fa-eye"></i> Afficher</a>
              <a href="" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Supprimer</a>
            </td>
          </tr>

          <?php
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</section>


<?php

require_once '_footer.php';