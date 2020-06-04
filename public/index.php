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
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
      $errorMsg = NULL;
      $users = $userRepo->findBy(array("userName" => $_POST['username']));

      if (count($users) > 0) {
        $errorMsg = "Nickname already used.";
      } else if ($_POST['password'] != $_POST['passwordRetype']) {
        $errorMsg = "Passwords are not the same.";
      } else if (strlen(trim($_POST['password'])) < 8) {
        $errorMsg = "Your password should have at least 8 characters.";
      } else if (strlen(trim($_POST['username'])) < 4) {
        $errorMsg = "Your nickame should have at least 4 characters.";
      }
      if ($errorMsg) {
        include "../templates/registerForm.php";
      } else {
        // $userId = CreateNewUser($_POST['username'], $_POST['password']);
        $user = new User();
        $user->userName = $_POST['username'];
        $user->password = $_POST['password'];
        $manager->persist($user);
        $manager->flush();
        $_SESSION['user'] = $user;
        header('Location: ?action=display');
      }
    } else {
      include "../templates/registerForm.php";
    }
    break;
  case 'logout':
    if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
    }
    header('Location: ?action=display');
    break;
  case 'login':
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $users = $userRepo->findBy(array("userName" => $_POST['username'], "password" => $_POST['password']));
      if (count($users) == 1) {
        $_SESSION['user'] = $users[0];
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
