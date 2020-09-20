<?php

namespace Nadeera\Shopping;

use Nadeera\Shopping\Product;
use Nadeera\Shopping\CartItem;

/**
 * Represents the Shoping cart
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class Cart
{
    private static $cart;
    private $total = 0;

    /**
     * @var array
     */
    private $items = array();

    /**
     * Dependancy injection of product class
     *
     * @var Product
     */
    public $product;

    public function __construct()
    {
        $this->load();
    }

    /**
     * Get injected product object
     *
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * Dependancy injection of Product object
     *
     * @param Product $product
     * @return void
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * Syncing card with sesion
     *
     * @return void
     */
    private function load(): void
    {
        if (isset($_SESSION['cart-items'])) {
            $this->items = unserialize($_SESSION['cart-items']);
            $this->total = $_SESSION['cart-total'];
        }
    }

    /**
     * Syncing session state with the class data
     *
     * @return void
     */
    private function save(): bool
    {
        $this->calculateTotal();

        $_SESSION['cart-items'] = serialize($this->items);
        $_SESSION['cart-total'] = $this->total;

        return true;
    }

    /**
     * Calculate the total and update the cart
     *
     * @return void
     */
    private function calculateTotal(): void
    {
        $this->total = 0;
        foreach ($this->items as $item) {
            $this->total = $this->total + ($item->price * $item->quantity);
        }
        $this->total = round($this->total, 2);
    }

    /**
     * Add a product item to the cart
     *
     * @param string $productName
     * @return void
     */
    public function addItem(string $productName): bool
    {
        $product = $this->getProduct()->getByName($productName);
        $productId = array_search($productName, array_column($this->items, 'name'));

        if ($productId === false) {
            $item = new CartItem($product['name'], $product['price'], 1);
            $this->items[] = $item;
        } else {
            $this->items[$productId]->quantity += 1;
        }

        $this->save();
        return true;
    }

    /**
     * Get all the products in the cart
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Remove all items for a given product from the cart
     * 
     * @param [string] $productName
     * @return void
     */
    public function removeItem($name): bool
    {
        $itemId = array_search($name, array_column($this->items, 'name'));

        if ($itemId !== false) {
            unset($this->items[$itemId]);
            $this->items = array_values($this->items);
        }
        return $this->save();
    }

    /**
     * Return the final total of the cart
     *
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * Emtpy the cart
     *
     * @return void
     */
    public function clearCart(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }

        $this->items = array();
        $this->total = 0;
    }

    /**
     * Return singleton cart object
     *
     * @return App\Cart
     */
    public static function getCart(): Cart
    {
        if (self::$cart == null) {
            self::$cart = (new Cart());
        }

        return self::$cart;
    }
}
