<?php if (isset($_SESSION['user'])) {
    // var_dump($_SESSION['user']);
?>

    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        ajouter une recette
    </button>
    <form class="form-signin collapse" id="collapseExample" method="post" action="?action=new">
        <?php
        if (isset($errorMsg)) {
            echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
        }
        ?>
        <input type="text" class="form-control" name="nameRecipe" placeholder="nameRecipe" required="" autofocus="" />
        <input type="text" class="form-control" name="description" placeholder="description" required="" />
        <input type="text" class="form-control" name="typeRecipe" placeholder="typeRecipe" required="" />
        <input type="number" class="form-control" name="nbStars" placeholder="nombre étoile de la recette" required="" />
        <input type="text" class="form-control" name="image" placeholder="image url" required="" />

        <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
    </form>
<?php } ?>