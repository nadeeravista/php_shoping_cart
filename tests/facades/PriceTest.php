<?php

use Nadeera\Facades\Price;
use PHPUnit\Framework\TestCase;

/**
 * Represents the unit test for Price facade
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class PriceTest extends TestCase
{

    public function testFormatPrice (){
        $this->assertEquals("10.00", Price::formatPrice(10));
        $this->assertEquals("10.10", Price::formatPrice(10.1));
        $this->assertEquals("10.01", Price::formatPrice(10.01));
        $this->assertEquals("0.00", Price::formatPrice(0));
        $this->assertEquals("0.00", Price::formatPrice('A'));
    }

}