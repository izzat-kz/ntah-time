<?php 
session_start(); 

if(isset($_SESSION["cart"])) { 
    $cart = $_SESSION["cart"]; 
} else { 
    $cart = array(); 
} 

if(isset($_POST["add-to-cart"])){ 
    $product_name = $_POST["product_name"]; 
    $product_price = $_POST["product_price"]; 
    $product_picture = $_POST["product_picture"]; 
    $product_quantity = $_POST["product_quantity"]; 

    $cart_item = array( 
        "product_name" => $product_name, 
        "product_price" => $product_price, 
        "product_picture" => $product_picture, 
        "product_quantity" => $product_quantity, 
    ); 

// Check if item already exists in the cart
    $item_index = -1;
    foreach($cart as $index => $item) {
        if($item["product_name"] == $product_name) {
            $item_index = $index;
            break;
        }
    }

    // If item exists, update its quantity
    if($item_index != -1) {
        $cart[$item_index]["product_quantity"] += $product_quantity;
    } else {
    // If item does not exist, add it to the cart
    array_push($cart, $cart_item); 
    }

    $_SESSION["cart"] = $cart; 
} 


if(isset($_POST["clear_cart"])){ 
    $cart = array(); 
    unset($_SESSION["cart"]); 
    header("Location: cart.php"); 
    exit; 
} 

$total_quantity = 0; 
foreach($cart as $item) { 
    $total_quantity += $item["product_quantity"]; 
} 

?>

<html>
    <head>
        <title>Item In Cart</title>
        <link rel="stylesheet" href="stylesheet.css">
        <style>
#bg {
    background-image: url("image/bg5.jpeg");
    height: 200%;
}
.cart-item img {
width: 130px;
height: 130px;
margin-right: 20px;
}            

.cart-item-info {
    display: flex;
    flex-direction: column;
}

.cart-item-name {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}

.cart-item-price {
    font-size: 14px;
    margin-bottom: 5px;
}

.cart-item-quantity {
    font-size: 14px;
}

p {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.name {
    font-size: 12px;
     text-align: center;
}
        </style>
    </head>
    <body>
        <div id="bg">
            <div id="header2">
                NtahTime Watch Shop
                <p class="name"><i>~ Item In Cart ~</i></p>
            </div>
            <form method="post" action="cart.php">
                <input type="submit" name="clear_cart" value="Clear Cart" class="buttonRed">
            </form>
            <div id="cart-total">
                <p>Item In Cart: <?php echo $total_quantity; ?></p>
            </div>
            <div id="cart">
                <?php
                foreach($cart as $item){
                    echo '<div class="cart-item">';
                    echo '<img src="image/'.$item["product_picture"].'" alt="'.$item["product_name"].'" class="product-picture">';
                    echo '<div class="product-details">';
                    echo '<h3 class="product-name">'.$item["product_name"].'</h3>';
                    echo '<p class="product-price">RM '.$item["product_price"].'</p>';
                    echo '<p class="product-quantity">Quantity: '.$item["product_quantity"].'</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <a href='product.php?category=All Products' class="button">Add More Products</a>
            
            <a href="form.php" class="button">Check Out</a>
            </form>
            </div>
    </body>
</html>
