<?php
namespace App;

/**
 * Represents the Products for the shopign cart
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class Product
{

    /**
     *
     * @var array Prduct list as array
     */
    private $products;

    /**
     * Injecting dependancy of data to the class in object cration
     *
     * @param array $products Product list as array
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * Undocumented function
     *
     * @param string $name Name of the product
     * @return array The product details as array
     */
    public function getByName(string $name): array
    {
        $key = array_search($name, array_column($this->products, 'name'));
        return $this->products[$key];
    }
}

