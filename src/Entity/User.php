<?php

namespace Entity;

use ludk\Utils\Serializer;


class User
{

   public string $userName;
   public  int $id;
   public string $password;
   use Serializer;
}
