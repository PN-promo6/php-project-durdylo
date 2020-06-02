<?php

require_once '../vendor/autoload.php';
session_start();

use Entity\User;
use Entity\Recipe;
use ludk\Persistence\ORM;

$orm = new ORM(__DIR__ . '/../Resources');
$recipeRepo = $orm->getRepository(Recipe::class);
$recipes = $recipeRepo->findAll();
$recipe0 = $recipes[0];
$manager = $orm->getManager();
// //modifie le titre d'un recipe
// $recipe1 = $recipeRepo->find(1);
// $recipe1->nameRecipe = "nouveau titre";
// $manager->persist($recipe1);
// $manager->flush();

//var_dump($recipe0->user->userName);
//var_dump($recipes);


if (isset($_GET['search'])) {
  $search = $_GET['search'];
  if (strpos($search, "@") === 0) {
    $userRepo = $orm->getRepository(User::class);
    $userName = substr($search, 1);
    $users = $userRepo->findBy(array('userName' => $userName));
    if (count($users) == 1) {
      # code...
      $user = $users[0];
      $recipes = $recipeRepo->findBy(array('user' => $user->id));
    }
  } else {
    $recipes = $recipeRepo->findBy(array('description' => $search));
  }
} else {
  $recipes = $recipeRepo->findAll();
}
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
  <title>Devenir un chef</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
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
        <form method="get" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">

    <div class="row mt-3">
      <aside class="col-lg-3">
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
      <section class="row col-lg-6 p-0">

        <?php

        foreach ($recipes as $key => $recipe) {
          # code...
          //var_dump($recipe);
          $userRecipe = $recipe->user;

        ?>
          <div class="card col-lg-6 mb-2">
            <img src=" <?php echo $recipe->image; ?> " class="card-img" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $recipe->nameRecipe; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"> <a href="?search=@<?php echo $userRecipe->userName ?> "><?php echo '@' . $userRecipe->userName; ?></a></h6>
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
      <aside class="col-lg-3">
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