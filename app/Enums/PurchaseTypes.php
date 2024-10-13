<?php

namespace App\Enums;

enum PurchaseTypes: string
{
    /**
     * Product rental.
     */
    case RENT = 'rent';

    /**
     * Full product buyout.
     */
    case BUYOUT = 'buyout';
}
