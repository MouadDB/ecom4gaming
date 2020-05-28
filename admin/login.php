<?php

require_once '../config.php';

//Auth::logout();

$login_data = Auth::login();

require_once '_html_header.php';

?>

<div class="container mt-5 ">
    <div class="row justify-content-center">
        <aside class="col-xl-4 col-lg-5 col-md-7 col-sm-10">
            <h1 class="text-center font-weight-normal my-5 pt-5">Ecom4Gaming</h1>
            <?php if(isset($login_data['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $login_data['error'] ?>
                </div>
            <?php endif ?>
            <div class="card">
                <article class="card-body">
                    <a href="" class="float-right btn btn-outline-primary">Sign up</a>
                    <h4 class="card-title mb-4 mt-1">Sign in</h4>
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" class="form-control" placeholder="Username" type="text">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <a class="float-right" href="#">Forgot?</a>
                            <label>Your password</label>
                            <input name="password" class="form-control" placeholder="******" type="password">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <div class="checkbox">
                                <label> <input type="checkbox"> Save password </label>
                            </div> <!-- checkbox .// -->
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                </article>
            </div> <!-- card.// -->
        </aside>
    </div>
</div>