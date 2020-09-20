<?php

namespace Nadeera\Facades;

/**
 * Represents the Price facade
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class Price
{
    /**
     * Returned formated price as two decimal
     *
     * @param float $price
     * @return string
     */
    public static function formatPrice(float $price): string
    {
        return number_format((string)$price, 2);
    }
}
