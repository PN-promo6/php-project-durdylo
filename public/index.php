<?php

require_once '../vendor/autoload.php';
session_start();

use Entity\User;
use Entity\Recipe;
use ludk\Persistence\ORM;
use Controller\AuthController;
use Controller\HomeController;
use Controller\RecipeController;

$orm = new ORM(__DIR__ . '/../Resources');
$recipeRepo = $orm->getRepository(Recipe::class);
$userRepo = $orm->getRepository(User::class);
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



$action = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);
switch ($action) {
  case 'register':
    $authController = new AuthController();
    $authController->register();
    break;
  case 'logout':
    $authController = new AuthController();
    $authController->logout();
    break;
  case 'login':
    $authController = new AuthController();
    $authController->login();
    break;
  case 'new':
    $recipeController = new RecipeController();
    $recipeController->createRecipe();
    break;
  case 'display':
  default:
    $homeController = new HomeController();
    $homeController->display();

    break;
}
