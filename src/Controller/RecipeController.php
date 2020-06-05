<?php

namespace Controller;

use Entity\Recipe;

class RecipeController
{
    public function createRecipe()
    {
        global $manager;
        if (isset($_SESSION['user']) && isset($_POST['nameRecipe']) && isset($_POST['description']) && isset($_POST['typeRecipe']) && isset($_POST['nbStars']) && isset($_POST['image'])) {
            $newrecipe = new Recipe();
            $newrecipe->user = $_SESSION['user'];
            $newrecipe->nameRecipe = $_POST['nameRecipe'];
            $newrecipe->description = $_POST['description'];
            $newrecipe->typeRecipe = $_POST['typeRecipe'];
            $newrecipe->nbStars = $_POST['nbStars'];
            $newrecipe->image = $_POST['image'];
            $manager->persist($newrecipe);
            $manager->flush();
            header('Location: /display');
        } else {
            $errorMsg = "Certains des champs ne sont pas remplis";
        }
    }
}
