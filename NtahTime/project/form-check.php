<link rel="stylesheet" href="stylesheet.css">

<?php 
// check cart if empty
if(empty($_SESSION["cart"])){
    echo '<div id="header2">NtahTime Watch Shop</div>';
    echo "<h3>Your Cart Is Empty</h3>";
    echo '<a href="product.php?category=All Products" class="button">Browse Product</a>';
    exit;
}
?>

<?php 
$paymentType = null;
$paymentType_err = null;
$buyerName = null;
$buyerName_err = null;
$phone = null;
$phone_err = null;
$notes = null;

if(isset($_POST['paymentType']) && $_POST['paymentType'] !== '') {
    $paymentType = $_POST['paymentType']; 
}
if(isset($_POST['buyerName'])) {
    $buyerName = $_POST['buyerName'];
}
if(isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}
if(isset($_POST['notes'])) {
    $notes = $_POST['notes'];
}


    if(empty(trim($paymentType))) {
        return $paymentType_err = "Please choose one of the payment types";
    } else {

    if(empty(trim($buyerName))){
        return $buyerName_err = "Name field is empty";
    } else if (preg_match('/\d/', $buyerName)) {
        return $buyerName_err = "Name cannot contain numbers";
    } else{

    if(empty(trim($phone))){
        return $phone_err = "Phone number field is empty";
    } else if (!preg_match('/^01\d{5,13}$/', $phone)) {
        return $phone_err = "Wrong format number";
    }


    if(empty($paymentType_err) && empty($buyerName_err) && empty($phone_err)) {
        
        $_SESSION['paymentType'] = $paymentType;
        $_SESSION['buyerName'] = $buyerName;
        $_SESSION['phone'] = $phone;
        $_SESSION['notes'] = $notes;
    


?>

<html><head><title>Payment Information</title>
<link rel="stylesheet" href="stylesheet.css">
<style>
.success {
    color: #42af6a;
    background-color: #e8fdf8;
    padding: 10px;
    display: block;
    transform: translateY(-20px);
    margin-top: 25px;
    font-size: 20px;
    width: 230px;
}
.fieldAdd {
    background-color: whitesmoke;
    margin-top: 100px;
    margin-left: 300px;
    margin-right: 300px;
}
#bg {
    background-image: url("image/bg5.jpeg");
    height: 100%;
}
</style></head> 
<body>
<div id="bg">
    <div id="header2">NtahTime Watch Shop</div>
    <fieldset class="fieldAdd">
                        <p style="font-size:larger;">Payment Information<br /><br /></p>
                        <p>Payment Type:   <b><?php echo $paymentType ?></b></p>
                        <p>Name:           <b><?php echo $buyerName ?></b></p>
                        <p>Phone Number:   <b><?php echo $phone ?></b></p>
                        <p>Notes:          <b><?php echo $notes ?></b></p>
                        <p class="success">Success!</p>
                        <a href="form.php"class="buttonRed">Edit</a>     <a href="order-summary.php"class="button">Next</a>
                    </fieldset>
</div></div>   
</body></html>
        
        <?php
        exit;
}
}
}  


?>
