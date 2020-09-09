<?php
/**
 * A simple routing file to handle view requests
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

/**
 * Getting the singleton object of the cart
 * @return Cart
 */
$cart = \Nadeera\Shopping\Cart::getCart();

$message = "";

if (isset($_REQUEST['action'])) {

    $action = $_REQUEST['action'];
    
    switch ($action) {

        case 'add_to_cart':
            $productName = $_REQUEST['product'];
            $product = new \Nadeera\Shopping\Product($products);
            $cart = new \Nadeera\Shopping\Cart();
            $cart->setProduct($product);
            $cart->addItem($productName);
            $message = "The item <b>$productName</b> added to cart";
            break;

        case 'remove_cart_item':
            $productName = $_REQUEST['product'];
            $cart = new \Nadeera\Shopping\Cart();
            $cart->removeItem($productName);
            $message = "The item <b>$productName</b> removed from the";
            break;

        case 'clear_cart':
            $cart = new \Nadeera\Shopping\Cart();
            $cart->clearCart();
            header('Location: ./'.$baseFile.'?action');
            break;

        default:
            $cart = new \Nadeera\Shopping\Cart();
            break;
    }
}

$cartItems = $cart->getItems();
