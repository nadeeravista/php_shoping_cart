<?php
namespace App;

/**
 * Represents the Products for the shopign cart
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class Product
{

    private $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function getByName(string $name): array
    {
        $key = array_search($name, array_column($this->products, 'name'));
        return $this->products[$key];
    }
}

