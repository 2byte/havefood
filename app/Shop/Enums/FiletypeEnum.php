<?php

namespace App\Shop\Enums;

enum FiletypeEnum: string
{
  use HelperTrait;
  
  case Img = 'img';
  case File = 'file';
  
  
}