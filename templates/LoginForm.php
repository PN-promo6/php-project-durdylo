<!DOCTYPE html>
<html lang="en">

<?php include 'head.php' ?>

<body>

  <?php include "navbar.php" ?>
  <div class="container">

    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <form class="form-signin" method="post" action="?action=login">
          <h2 class="form-signin-heading">Welcome Back</h2>
          <?php
          if (isset($errorMsg)) {
            echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
          }
          ?>
          <input type="text" class="form-control" name="username" placeholder="username" required="" autofocus="" />
          <input type="password" class="form-control" name="password" placeholder="Password" required="" />
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>