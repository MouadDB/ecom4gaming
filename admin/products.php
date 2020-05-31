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
        <button class="btn btn-outline-secondary float-right" data-toggle="modal" data-target="#add_product"><i
            class="fa fa-plus"></i> Ajouter une table</button>

        <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="add_product" aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width:46%" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="modal-message">
                </div>
                <form id="add_product_form">
                  <div class="form-group">
                    <label for="product_name">Product name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
                  </div>
                  <div class="form-group">
                    <label for="product_cats">Categories</label>
                    <select name="product_cats" id="product_cats" class="form-control" multiple required>
                      <?php foreach ($cats_names as $cat_id => $cat_name): ?>
                        <option value="<?= $cat_id ?>"><?= $cat_name ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="product_thumb">Thumbnail URL</label>
                    <input type="text" class="form-control" id="product_thumb" name="product_thumb" required>
                  </div>
                  <div class="form-group">
                    <label for="product_price">Price</label>
                    <input type="text" class="form-control" id="product_price" name="product_price" required>
                  </div>
                  <div class="form-group">
                    <label for="product_quantity">Quantity</label>
                    <input type="number" class="form-control" id="product_quantity" name="product_quantity" required>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="add_product_button">Ajouter un Produits</button>
              </div>
            </div>
          </div>
        </div>
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