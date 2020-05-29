<?php

require_once '../config.php';

Auth::check();

require_once '_html_header.php';
require_once '_header.php';

$categories = new Categories();

if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete' && is_numeric($_GET['id'])) {
  $categories->delete_category($_GET['id']);

  $msg = '<div class="alert alert-success">The category has been deleted</div>';
}

$all_cats = $categories->get_all_cats();

?>

<section class="home mt-5">
  <div class="row ">
    <div class="col-lg-12">
      <div class="page-header">
        <?= isset($msg) ? $msg : ''; ?>
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
                <div class="modal-message">
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
              <button class="btn btn-outline-success" data-toggle="modal" data-target="#edit_category"
                data-id="<?=$product['id']?>" data-name="<?=$product['name']?>"><i class="fa fa-edit"></i>
                Modifier</button>

              <a href="./categories.php?action=delete&id=<?=$product['id']?>" class="btn btn-outline-danger delete-category"
                ><i class="fa fa-trash"></i> Supprimer</a>
            </td>
          </tr>

          <?php
          }
          ?>

        </tbody>
      </table>
      <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="edit_category" aria-hidden="true">
          <div class="modal-dialog modal-lg" style="max-width:36%" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier une Catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="modal-message">
                </div>
                <form id="edit_category_form">
                <input type="hidden" name="category_id" >
                  <div class="form-group">
                    <label for="category_name">Category name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="update_category_button">Modifier la Catégorie</button>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>

<?php


require_once '_footer.php';