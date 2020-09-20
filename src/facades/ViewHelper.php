<?php

namespace Nadeera\Facades;

use Nadeera\Facades\Price;

/**
 * Stores the helper function used by view
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class ViewHelper
{
    /**
     * Undocumented function
     *
     * @param string $name
     * @param array $arguments
     * @return mix
     */
    public function __call($name, $arguments)
    {
        switch ($name) {
            // Format the number to price
            case 'formatPrice':
                return Price::formatPrice((float) $arguments[0]);
                break;
            // String will be converted to application configured language pack
            case 'lang':
                return "";
                break;
            default:
                return null;
                break;
        }
    }
}
