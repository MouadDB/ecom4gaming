<?php

require_once '../config.php';

Auth::check();

require_once '_html_header.php';
require_once '_header.php';

$categories = new Categories();

$all_cats = $categories->get_all_cats();

?>

<section class="home mt-5">
  <div class="row ">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables" class="float-left">Categories</h1>
        <button class="btn btn-outline-secondary float-right" data-toggle="modal" data-target="#add_db"><i
            class="fa fa-plus"></i> Ajouter une Catégorie</button>


        <div class="modal fade" id="add_db" tabindex="-1" role="dialog" aria-labelledby="add_db" aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width:36%" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une Catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="db_message">
                </div>
                <form id="add_category_form">
                  <div class="form-group">
                    <label for="category_name">Category name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="add_category_button">Ajouter la Catégorie</button>
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

            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>

          <?php

          foreach ($all_cats as $product) {

          ?>
          <tr>
            <td><strong><?=$product['id']?></strong></td>
            <td><?=$product['name']?></td>

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