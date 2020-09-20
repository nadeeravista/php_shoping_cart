<?php

namespace Nadeera\Shopping;

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
     * Gets list of product as array
     *
     * @return void
     */
    public function getProducts(): array
    {
        if ($this->products == null) {
            return  [
                ["name" => "Sledgehammer", "price" => 125.75],
                ["name" => "Axe", "price" => 190.50],
                ["name" => "Bandsaw", "price" => 562.131],
                ["name" => "Chisel", "price" => 12.9],
                ["name" => "Hacksaw", "price" => 10.50],
            ];
        } else {
            return $this->products;
        }
    }

    /**
     *  Injecting product list
     *
     * @param array $products Sets product list as array
     * @return void
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    /**
     * Search and gets a product by name
     *
     * @param string $name Name of the product
     * @return array The product details as array
     */
    public function getByName(string $name): array
    {
        $key = array_search($name, array_column($this->getProducts(), 'name'));
        return $this->getProducts()[$key];
    }
}