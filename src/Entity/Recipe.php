<?php

namespace Entity;

use ludk\Utils\Serializer;


class Recipe
{
    public string $nameRecipe;
    public int $id;
    public string $typeRecipe;
    public string $description;
    public string $image;
    public int $nbStars;
    public User $user;
    use Serializer;
}
