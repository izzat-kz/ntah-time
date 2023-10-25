<?php session_start(); ?>
<?php require("form-check.php"); ?>

<html>
<head>

    <title>Checkout</title>
    
<link rel="stylesheet" href="stylesheet.css">

<style>

.error {
    color: #af4242;
    background-color: #fde8ec;
    padding: 10px;
    display: none;
    transform: translateY(-20px);
    margin-top: 25px;
    margin-bottom: 20px;
    font-size: 14px;
    width: 230px;
}

.buttonRed {
              background-color: #af4c4c;
              border: none;
              color: white;
              padding: 5px 22px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              cursor: pointer;
          }

#bg {
    background-image: url("image/bg5.jpeg");
    height: 100%;
}

.name {
    font-size: 12px;
    text-align: center;
}
</style>   

<?php

if($paymentType_err != null){
    echo '<style>.paymentTypeErr{display: block}</style>';
}
if($buyerName_err != null){
    echo '<style>.buyerNameErr{display: block}</style>';
}
if($phone_err != null){
    echo '<style>.phoneErr{display: block}</style>';
}


?>
</head>
<body>
<div id="header2">
    NtahTime Watch Shop
    <p class="name"><i>~ Buyer's Form ~</i></p>
</div>
<div id="bg">
        <form action="form.php" method="post" autocomplete="off">
        
        
<fieldset class="field"><legend class="legend">Type of Payment</legend>
    <br>
    <p  class="radio"><input type="radio" name="paymentType" value="Cash On Delivery" <?php if($paymentType === 'Cash On Delivery') echo 'checked'; ?>> Cash On Delivery</p>
    <p  class="radio"><input type="radio" name="paymentType" value="Online Banking" <?php if($paymentType === 'Online Banking') echo 'checked'; ?>> Online Banking</p>
    <p  class="radio"><input type="radio" name="paymentType" value="Credit/Debit Card" <?php if($paymentType === 'Credit/Debit Card') echo 'checked'; ?>> Credit/Debit Card</p>
    <p class="error paymentTypeErr">
    <?php echo $paymentType_err ?>
    </p>
</fieldset>

<fieldset class="field"><legend class="legend">Buyer's Information</legend>
<br>
<p>Full Name<b style="color:red;">*</b></p>
<input type="text" name="buyerName" size="30" value="<?php echo $buyerName ?>">
<p class="error buyerNameErr">
<?php echo $buyerName_err ?>
</p>
<p>Phone Number<b style="color:red;">*</b></p>
<input type="tel" name="phone" size="20" value="<?php echo $phone ?>" placeholder="01XXXXXXXXX">
<p class="error phoneErr">
<?php echo $phone_err ?>
</p>
<p>Notes</p>
<textarea name="notes"><?php echo $notes ?></textarea>
<p><button type="submit" name="confirmed" class="button">Confirm</button><span>    </span><a href="cart.php" class="buttonRed">Cancel</a></p>
</fieldset>

</form>
</div>
</body>
</html>