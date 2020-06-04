<?php

require_once '../vendor/autoload.php';
session_start();

use Entity\User;
use Entity\Recipe;
use ludk\Persistence\ORM;

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



$action = $_GET["action"] ?? "display";
switch ($action) {
  case 'register':
    break;
  case 'logout':
    if (isset($_SESSION['userId'])) {
      unset($_SESSION['userId']);
    }
    header('Location: ?action=display');
    break;
  case 'login':
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $users = $userRepo->findBy(array("userName" => $_POST['username'], "password" => $_POST['password']));
      if (count($users) == 1) {
        $_SESSION['userId'] = $users[0]->id;
        header('Location: ?action=display');
      } else {
        $errorMsg = "Wrong login and/or password.";
        include "../templates/LoginForm.php";
      }
    } else {
      include "../templates/LoginForm.php";
    }
    break;
  case 'new':
    break;
  case 'display':
  default:
    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      if (strpos($search, "@") === 0) {
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
    include "../templates/display.php";

    break;
}
