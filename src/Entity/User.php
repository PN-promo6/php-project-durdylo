<?php

namespace Entity;

use ludk\Utils\Serializer;


class User
{

   public $userName;
   public  $id;
   public  $password;
   use Serializer;
}
