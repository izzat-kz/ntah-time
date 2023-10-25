<?php
session_start();

if(isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
} else {
    $cart = array();
}

// Retrieve all session values
$shipping_address = $_SESSION["shipping_address"] ?? "";
$shipping_city = $_SESSION["shipping_city"] ?? "";
$shipping_state = $_SESSION["shipping_state"] ?? "";
$shipping_postcode = $_SESSION["shipping_postcode"] ?? "";

$paymentType = $_SESSION["paymentType"] ?? "";
$buyerName = $_SESSION["buyerName"] ?? "";
$phone = $_SESSION["phone"] ?? "";
$notes = $_SESSION["notes"] ?? "";

$cart = $_SESSION["cart"] ?? [];

$total_price = 0;
foreach ($cart["product_price"] ?? [] as $pricekey => $price) {
    $total_price += $price * ($cart["product_quantity"][$pricekey] ?? 0);
}

?>

<html>
<head>
    <title>Order Summary</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
.field {
    background-color: whitesmoke;
    margin-top: 70px;
    margin-left: 400px;
    margin-right: 400px;
}
h3 {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: larger;
    text-decoration:underline;
}

p {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}


#bg {
    background-image: url("image/bg5.jpeg");
    height: 140%;
}
mark {
    background-color: #3f435e;
    color: whitesmoke;
}
    </style>
</head>
<body>
    <div id="bg">
    <div id="header2">NtahTime Watch Shop</div>
    <fieldset class="field">
        <legend style="font-size:x-large">Order Summary</legend>
        <h3><br />Shipping Destination</h3>
        <p><?php echo $shipping_address ?></p>
        <p><?php echo $shipping_city . ', ' . $shipping_state?></p>
        <p><?php echo $shipping_postcode ?></p>
        <br />
        


    <?php if (!empty($cart)): ?>
        <h3>Product List</h3>
        <?php 
        foreach ($cart as $product) {
            $name = $product['product_name'];
            $price = $product['product_price'];
            $quantity = $product['product_quantity'];
            $subtotal = $price * $quantity;
            $total_price += $subtotal;
        ?>
        
            <p>- <?php echo $name . ': (RM ' . $price . ')  x  ' . $quantity . ' = RM ' . number_format($subtotal, 2) ?></p>
        <?php } ?>
        
        <p><br />Total price: <u>RM <?php echo number_format($total_price, 2) ?></u></p>
        <br />

<?php endif; ?>

        <h3>Payment Information</h3>
        <p>Payment: <i><?php echo $paymentType ?></i></p>
        <p>Name: <i><?php echo $buyerName ?></i></p>
        <p>Phone: <i><?php echo $phone ?></i></p>
        <p>Notes: <i><?php echo $notes ?></i></p>
        <br />
        <p><a href="cart.php" class="buttonRed">Cancel</a> <a href="gateway.html" class="button">Place Order</a></p>
    </fieldset>
    </div>
</body>
</html>