<?php require("shipping-check.php") ?>

<html>
    <head>
        <title>Shipping Address</title>

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

.fieldAdd {
    background-color: whitesmoke;
    margin-top: 50px;
    margin-left: 100px;
    margin-right: 100px;
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
        if($address_err != null){
            ?> <style>.addressErr{display: block}</style> <?php
        }
        if($city_err != null){
            ?> <style>.cityErr{display: block}</style> <?php
        }
        if($state_err != null){
            ?> <style>.stateErr{display: block}</style> <?php
        }
        if($postcode_err != null){
            ?> <style>.postcodeErr{display: block}</style> <?php
        }
?>


    </head>
    <body>
        <div id="bg">
        <div id="header2">
        NtahTime Watch Shop
        <p class="name"><i>~ Shipping Destination ~</i></p>
        </div>
        <form action="shipping.php" method="post" autocomplete="off">
<fieldset class="fieldAdd"><legend><b>Shipping Address</b></legend>

               <p><b>Address</b><b style="color:red;">*</b></p>           
               <input type="text" name="shipping_address" placeholder="Address" size="75" value="<?php echo $shipping_address ?>">
               <p class="error addressErr">
               <?php echo $address_err ?>
               </p>

               <p><b>City</b><b style="color:red;">*</b></p>
               <input type="text" name="shipping_city" placeholder="City" size="13" value="<?php echo $shipping_city ?>">
               <p class="error cityErr">
               <?php echo $city_err ?>
               </p>

               <p><b>State</b><b style="color:red;">*</b></p>
               <select name="shipping_state">
                <option value="null">Select A State</option>
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Melaka">Melaka</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Pulau Pinang">Pulau Pinang</option>
                <option value="Sabah">Sabah</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
                <option value="Kuala Lumpur">Kuala Lumpur</option>
            </select>
            <p class="error stateErr">
            <?php echo $state_err ?>
               </p>

               <p><b>Postcode</b><b style="color:red;">*</b></p>
               <input type="number" name="shipping_postcode" placeholder="Postcode" size="6" value="<?php echo $shipping_postcode ?>">
               <p class="error postcodeErr">
               <?php echo $postcode_err ?>
               </p>
    
               <p><br><input type="checkbox" name="default"> <i>set address as default?</i></p>
               <p><button type="submit" class="button" name="confirmed">Confirm Address</button></p>

</fieldset>
</form>
</div>

    </body>
</html>