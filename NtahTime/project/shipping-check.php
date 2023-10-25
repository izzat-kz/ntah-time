
<?php 

$shipping_address = null;
$address_err = null;
$shipping_city = null;
$city_err = null;
$shipping_state = null;
$state_err = null;
$shipping_postcode = null;
$postcode_err = null;


if(isset($_POST['confirmed'])) {
    $shipping_address = $_POST['shipping_address'];
    $shipping_city = $_POST['shipping_city'];
    $shipping_state = $_POST['shipping_state'];
    $shipping_postcode = $_POST['shipping_postcode'];

    if(empty(trim($shipping_address))){
        return $address_err = "Address field is empty";
    } else{
        
        if(empty(trim($shipping_city))){
            return $city_err = "City field is empty";
        } else{

            if(!preg_match("/^[a-zA-Z\s]+$/", $shipping_city)){
                return $city_err = "City can only contain letters";
            } else {
                
                if($shipping_state=='null'){
                    return $state_err = "Select your state";
                } else{
                    
                    if(empty(trim($shipping_postcode))){
                        return $postcode_err= "Postcode field is empty";
                    }else if (!preg_match('/^\d{5}$/', $shipping_postcode)) {
                        return $postcode_err = "Postcode should be a 5-digit number";
                   }
                    
                   if(empty($address_err) && empty($city_err) && empty($state_err) && empty($postcode_err)) {
                    
                    session_start();
                    
                    $_SESSION['shipping_address'] = $shipping_address;
                    $_SESSION['shipping_city'] = $shipping_city;
                    $_SESSION['shipping_state'] = $shipping_state;
                    $_SESSION['shipping_postcode'] = $shipping_postcode;

                        echo '';
                        
                        
                        
                        ?>
                        
<html><head> <title>success</title>
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
</style>
</head> <body>

<div id="bg">
    <div id="header2">NtahTime Watch Shop</div>
                    <fieldset class="fieldAdd">
                        <p style="font-size:larger;">Shipping Destination:<br /><br /></p>
                        <p><b><?php echo $shipping_address . ',' ?></b></p>
                        <p><b><?php echo $shipping_city . ', ' . $shipping_state . ',' ?></b></p>
                        <p><b><?php echo $shipping_postcode ?></b><br /></p>
                        <p class="success">Success!</p>
                        <a href="shipping.php"class="buttonRed">Edit</a>     <a href="category.html"class="button">Next</a>
                    </fieldset>
</div>
</body></html>

                        <?php
                        exit;
                    }
                }
            }
        }
    }
}

?>