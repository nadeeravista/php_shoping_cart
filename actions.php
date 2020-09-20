<?php

use Nadeera\Facades\Response;
use Nadeera\Shopping\Cart;
use Nadeera\Shopping\Product;

/**
 * A simple routing file to handle view requests
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

/**
 * Getting the singleton object of the cart
 * @return Cart
 */

session_start();
$responseData = array();
$responseData['message'] = "";

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = "\\";
}

if (isset($_REQUEST['action'])) {

    $action = $_REQUEST['action'];

    switch ($action) {

        case 'add_to_cart':

            $productName = $_REQUEST['product'];
            $cart = Cart::getCart();
            $cart->setProduct(new Product());
            $cart->addItem($productName);
            $responseData['message'] = "The item <b>$productName</b> added to cart";
            $responseData['cart'] = $cart;
            Response::view("views.shopping.cart_view", $responseData);
            break;

        case 'remove_cart_item':

            $productName = $_REQUEST['product'];
            $cart = new Cart();
            $cart->removeItem($productName);
            $responseData['message'] = "The item <b>$productName</b> removed from the";
            $responseData['cart'] = $cart;
            Response::view("views.shopping.cart_view", $responseData);
            break;

        case 'clear_cart':

            $cart = new Cart();
            $cart->clearCart();
            header('Location: ./' . $baseFile . '?action');
            break;

        default:

            $cart = Cart::getCart();
            $responseData['cart'] = $cart;
            Response::view("views.shopping.cart_view", $responseData);
            break;
    }
}
