<?php

namespace App\Enums;

enum Property_type:string
{
     case SINGLE = 'Single-family Home';
    case TOWNHOUSE = 'TownHouse';
    case MULTIFAMILY = 'Multi-family Home';
    case BUNGALOW = 'Bungalow';

}
