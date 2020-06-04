<?php if (isset($_SESSION['user'])) {
    // var_dump($_SESSION['user']);
?>
    <h3>ajouter une recette</h3>
    <form class="form-signin" method="post" action="?action=new">
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

        <button class="btn btn-lg btn-primary btn-block" type="submit">Ajouter</button>
    </form>
<?php } ?>