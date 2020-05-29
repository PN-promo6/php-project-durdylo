<?php

namespace Entity;

use ludk\Utils\Serializer;


class Recipe
{
    public $nameRecipe;
    public $id;
    public $typeRecipe;
    public $description;
    public $image;
    public $nbStars;
    public User $user;
    use Serializer;
}
