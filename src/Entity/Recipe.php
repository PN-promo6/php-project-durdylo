<?php

namespace Entity;

class Recipe
{
    public $nameRecipe;
    public $id;
    public $typeRecipe;
    public $description;
    public $image;
    public $nbStars;
    public User $user;
}
