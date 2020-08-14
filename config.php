<?php 

/**
 * Hold the initial configuration settings, data and helper files
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

ini_set('display_errors', 1);
ini_set('expose_php', 'Off');
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$baseFile = "index.php";

$products = [
    [ "name" => "Sledgehammer", "price" => 125.75 ],
    [ "name" => "Axe", "price" => 190.50 ],
    [ "name" => "Bandsaw", "price" => 562.131 ],
    [ "name" => "Chisel", "price" => 12.9 ],
    [ "name" => "Hacksaw", "price" => 10.50 ],
   ];

function format_price($price): string {
    return number_format((float)$price, 2, '.', '');
}
