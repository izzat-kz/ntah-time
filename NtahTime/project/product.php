<?php

$products = array(
    "Watches For Him" => array(
        array(
            "name" => "Timex Weekender",
            "picture" => "weekender.jpg",
            "price" => "232.00"
        ),
        array(
            "name" => "Timex Expedition",
            "picture" => "expedition.jpg",
            "price" => "276.00"
        ),
        array(
            "name" => "Orient 3 Star",
            "picture" => "tristar.jpg",
            "price" => "525.00"
        ),
        array(
            "name" => "Casio Analog",
            "picture" => "analog.jpg",
            "price" => "183.00"
        ),
        array(
            "name" => "Casio Edifice",
            "picture" => "edifice.jpg",
            "price" => "472.00"
        )
    ),

    "Watches For Her" => array(
        array(
            "name" => "Bonia Elegance",
            "picture" => "eleganceW.jpg",
            "price" => "398.00"
        ),
        array(
            "name" => "Casio Gold Analog",
            "picture" => "analogW.jpg",
            "price" => "214.00"
        ),
        array(
            "name" => "Orient Classic",
            "picture" => "classicW.jpg",
            "price" => "363.00"
        ),
        array(
            "name" => "Citizen Quartz",
            "picture" => "quartzW.jpg",
            "price" => "484.00"
        ),
        array(
            "name" => "Citizen Crystal Gold",
            "picture" => "crystalW.jpg",
            "price" => "875.00"
        )
    ),
    
    "Clock" => array(
        array(
            "name" => "Seiko Wall Clock",
            "picture" => "clock1.jpg",
            "price" => "216.00"
        ),
        array(
            "name" => "Seiko Digital Wall Clock",
            "picture" => "clock2.jpg",
            "price" => "336.00"
        ),
        array(
            "name" => "Rhythm Wall Clock",
            "picture" => "clock3.jpg",
            "price" => "206.00"
        )
    ),

    "Accessories" => array(
        array(
            "name" => "Vintage Leather Strap",
            "picture" => "acc1.jpg",
            "price" => "82.00"
        ),
        array(
            "name" => "Polished Bracelet",
            "picture" => "acc2.jpg",
            "price" => "158.00"
        ),
        array(
            "name" => "Genuine Leather Strap",
            "picture" => "acc3.jpg",
            "price" => "52.00"
        ),
        array(
            "name" => "Titanium Bracelet",
            "picture" => "acc4.jpg",
            "price" => "90.00"
        )
    )
);

function displayProducts($category, $products) {
    foreach($products[$category] as $product) {
        echo '<form method="post" action="cart.php">';
        echo '<div class="product">';
        echo '<div class="box">';
        echo '<img src="image/'.$product["picture"].'" alt="'.$product["name"].'">';
        echo '<h3>'.$product["name"].'</h3>';
        echo '<p>RM '.$product["price"].'</p>';
        echo '<input type="hidden" name="product_name" value="' . $product['name'] . '">';
        echo '<input type="hidden" name="product_price" value="' . $product['price'] . '">';
        echo '<input type="hidden" name="product_picture" value="' . $product['picture'] . '">';
        echo '</div>';       
        echo '<input type="number" name="product_quantity" value="1" min="1" max="30" class="quantityBox"><button type="submit" name="add-to-cart">Add to Cart</button>';
        echo '</div>';
        echo '</form>';
    }
}
$category = isset($_GET['category']) ? $_GET['category'] : 'All Products';
?>


<html>
    <head>
        <title>NtahTime Watch Shop</title>
        
<link rel="stylesheet" href="stylesheet.css">
<style>
            .name {
              font-size: 12px;
              text-align: center;
            }
            #page {
              background-image: url("image/bg4.jpeg");
              height: 231%;
            }

            ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              width: 200px;
              background-color: #333;
              position: absolute;
              height: 208%;
              overflow: auto;
            }
            p {
              font-family: Arial, Helvetica, sans-serif;
            }
            .box {
                border: 1px solid black;
                background-color: whitesmoke;
                box-shadow: 5px 7px 10px #888888;
            }




</style>
    </head>
    <body>
<div id="page">
    <div id="header2">
        NtahTime Watch Shop
<p class="name"><i>~ <?php echo $category; ?> ~</i></p>
    </div>
    <ul>

        <li><a href="?category=All Products" >All Products</a></li>
        <li><a href="?category=Watches For Him">Watches For Him</a></li>
        <li><a href="?category=Watches For Her">Watches For Her</a></li>
        <li><a href="?category=Clock">Wall Clock</a></li>
        <li ><a href="?category=Accessories">Accessories</a></li>
        <li><a href="cart.php" class="active">Check Cart</a></li>
    </ul>
    
    
        <?php
        

if($category == 'All Products') {
                echo '<div id="content">';
                displayProducts('Watches For Him', $products);
                displayProducts('Watches For Her', $products);
                displayProducts('Accessories', $products);
                displayProducts('Clock', $products);
                echo '</div>';
            } else {
                echo '<div id="content">';
                displayProducts($category, $products);
                echo '</div>';
            }
        ?>
    </div> 
</div>
    </body>
</html>