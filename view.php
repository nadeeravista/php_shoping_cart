<?php
/**
 * Represents the view file for the shoping cart
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
header( "Set-Cookie: name=value; httpOnly" );
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <div>
        <a href="./<?php $baseFile ?>">Home</a>
    </div>
    <?php if ($message) { ?>
        <div class="message"><?php echo $message ?></div>
    <?php } ?>
    <div class="products">
        <h3>Product List</h3>
        <ul>
            <?php foreach ($products as $productId=>$product) { ?>
                <li>
                    Name: <?php echo $product['name'] ?> | Price: <?php echo format_price($product['price']) ?> | <a href='./<?php echo $baseFile ?>?action=add_to_cart&product=<?php echo $product['name'] ?>'>Add</a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="cart">
        <h3>Your Cart</h3>
        <?php if (sizeof($cartItems) > 0) { ?>
            <?php foreach ($cartItems as $item) { ?>
                <ul>
                    <li>
                        <?php echo $item->name?> | Price: <?php echo format_price($item->price) ?> | Quantity: <?php echo $item->quantity ?> | <a href='./<?php echo $baseFile ?>?action=remove_cart_item&product=<?php echo $item->name ?>'> Remove </a>
                    </li>
                </ul>
            <?php } ?>
            <h4>Cart total: <?php echo format_price( $cart->getTotal() ); ?></h4>
            <br />
            <a href='./<?php echo $baseFile ?>?action=clear_cart'>Clear the cart</a>
        <?php } else { ?>
            <h4>Cart is empty </h4>
        <?php } ?>
    </div>
</body>

</html>