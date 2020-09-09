<?php

use Nadeera\Shopping\Cart;
use PHPUnit\Framework\TestCase;
use Nadeera\Shopping\Product;

class CartTest extends TestCase
{
    

    /**
     * Validate the total when various items added to cart
     *
     * @return void
     */
    public function testCalculateTotal(){
        
        $products = [
            [ "name" => "Sledgehammer", "price" => 125.75 ],
            [ "name" => "Axe", "price" => 190.50 ],
            [ "name" => "Bandsaw", "price" => 562.131 ],
            [ "name" => "Chisel", "price" => 12.9 ],
            [ "name" => "Hacksaw", "price" => 10.50 ],
           ];


        $product = new Product($products);
        $cart = new Cart();
        $cart->clearCart();

        $cart->setProduct($product);
        $cart->addItem('Axe');
        $this->assertEquals(190.50, $cart->getTotal());

        $cart->addItem('Sledgehammer');
        $this->assertEquals(316.25, $cart->getTotal());
        $cart->clearCart();
        
    }

    /**
     * Checks if the items are adding to cart
     *
     * @return void
     */
    public function testCheckAddingItemsToCart(){

        $products = [
            [ "name" => "Sledgehammer", "price" => 125.75 ],
            [ "name" => "Axe", "price" => 190.50 ],
           ];

           
        $product = new Product($products);
        $cart = new Cart();
        $cart->clearCart();

        $cart->setProduct($product);
        $cart->addItem('Sledgehammer');
        $this->assertCount(1, $cart->getItems());
        $cart->clearCart();
    }

    /**
     * When adding multiple items added to cart only the total should increase but no
     * duplicate items should be added to cart
     *
     * @return void
     */
    public function testAddingSameItemAgainToCart(){

        $products = [
            [ "name" => "Sugar", "price" => 10 ],
           ];

           
        $product = new Product($products);
        $cart = new Cart();
        $cart->clearCart();

        $cart->setProduct($product);
        $cart->addItem('Sugar');
        $this->assertCount(1, $cart->getItems());
        $this->assertEquals(10, $cart->getTotal());

        $cart->addItem('Sugar');
        $this->assertEquals(20, $cart->getTotal());

        $cart->clearCart();

    }

}
