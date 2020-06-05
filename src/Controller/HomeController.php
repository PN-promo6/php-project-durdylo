<?php

namespace Controller;

class HomeController
{

    public function display()
    {
        global $userRepo;
        global $recipeRepo;
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
    }
}
