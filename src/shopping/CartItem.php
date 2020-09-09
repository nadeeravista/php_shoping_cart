<?php
namespace Nadeera\Shopping;

/**
 * Represents the Items in the cart
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class CartItem {

    public $name;
    public $price;
    public $quantity;

    public function __construct(string $name, float $price, int $quantity) {

        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}