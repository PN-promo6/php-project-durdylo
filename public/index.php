<?php

require_once '../vendor/autoload.php';

use Entity\Recipe;
use Entity\User;


$user1 = new User();
$user1->userName = "switco";
$user1->password = "1234";
$user1->id = 0;

$user2 = new User();
$user2->userName = "durdylo";
$user2->password = "1234";
$user2->id = 1;

$recipe1 = new Recipe();
$recipe1->nameRecipe = "fondant au chocolat";
$recipe1->id = 0;
$recipe1->typeRecipe = 'dessert';
$recipe1->description = "fondant au chocolat étoilé";
$recipe1->image = "https://assets.afcdn.com/recipe/20160331/2847_w800h600c1cx1500cy1000.jpg";
$recipe1->nbStars = 1;
$recipe1->user = $user1;

$recipe2 = new Recipe();
$recipe2->nameRecipe = "coquille st jacques  ";
$recipe2->id = 1;
$recipe2->typeRecipe = 'plat principal';
$recipe2->description = "Coquilles Saint-Jacques et salade de noisettes rôties à la sauce au sirop d’érable";
$recipe2->image = "https://domaine-montrose.com/wp-content/uploads/2016/05/recette-saint-jacques-domaine-montrose.jpg";
$recipe2->nbStars = 4;
$recipe2->user = $user2;

$recipes = array($recipe1, $recipe2);
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Devenez un chef</title>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Devenir un Chef !! </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="row mt-3">
      <aside class="col-3">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Mes recettes
            <span class="badge badge-primary badge-pill">14</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Mon Profil
            <span class="badge badge-primary badge-pill">2</span>
          </li>
        </ul>
      </aside>
      <section class="col-6">
        <?php
        foreach ($recipes as $key => $recipe) {
          # code...
          //var_dump($recipe);
          $userRecipe = $recipe->user;
        ?>
          <div class="card mb-2">
            <img src=" <?php echo $recipe->image; ?> " class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $recipe->nameRecipe; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $userRecipe->userName; ?></h6>
              <p class="card-text"><?php echo $recipe->description; ?></p>
              <a href="#" class="card-link"><?php
                                            if ($recipe->nbStars > 1) {
                                              echo $recipe->nbStars . " étoiles";
                                            } else {
                                              echo $recipe->nbStars . " étoile";
                                            } ?></a>
              <a href="#" class="card-link"><?php echo $recipe->typeRecipe; ?></a>
            </div>
          </div>
        <?php
        }
        ?>

      </section>
      <aside class="col-3">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Apero
            <span class="badge badge-primary badge-pill">14</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Entrées
            <span class="badge badge-primary badge-pill">2</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Plat principal
            <span class="badge badge-primary badge-pill">1</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Déssert
            <span class="badge badge-primary badge-pill">1</span>
          </li>
        </ul>
      </aside>

    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>