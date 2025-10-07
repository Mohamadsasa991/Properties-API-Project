<?php

namespace App\Enums;

enum Property_status:string
{
    case SOLD = 'Sold';
    case SALE = 'On Sale';
    case HOLD = 'On Hold';

}
