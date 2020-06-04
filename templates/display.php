<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>
    <?php include "navbar.php" ?>

    <div class="container">

        <div class="row mt-3">
            <section class="row col-lg-9 p-0">

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
                        Entrées
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Plat principal
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Déssert
                    </li>
                </ul>
                <?php include 'addRecipe.php' ?>
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