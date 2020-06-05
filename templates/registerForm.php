<?php include 'head.php' ?>


<?php include "navbar.php" ?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
            <form class="form-signin" method="POST" action="/register">
                <h2 class="form-signin-heading">REGISTRATION</h2>
                <?php
                if (isset($errorMsg)) {
                    echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                }
                ?>
                <input type="text" class="form-control" name="username" placeholder="Nickname (4 characters)" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="Password (8 characters)" required="" />
                <label>Retype password:</label>
                <input type="password" class="form-control" name="passwordRetype" placeholder="Password" required="" />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
        </div>
    </div>
</div>