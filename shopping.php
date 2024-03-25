<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
           JavaScript 7th Edition
           Chapter 3 PHP
           Project: Shopping Calculator

           Author: Camila Lopez
           Date: 24 March 2024

           Filename: shopping.php
        -->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Web Scripting Languages</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css" />
        <script src="WSL.js" defer></script>
        <script src="Project8Ch9.js" defer></script>
    </head>
    <body>

        <!-- Side Nav Bar-->
        <div class="sideNav" id="overlaySideNav">
            <button class="hamburger">&#9776;</button>
            <nav class="menuNav">
                <a href="WSLProjects.html">Main Page</a>
                <a href="#">Project 3</a>
                <a href="Project4Ch5.html">Project 4 Ch5</a>
                <a href="Project5Ch6.html">Project 5 Ch6</a>
                <a href="Project6Ch7.html">Project 6 Ch7</a>
                <a href="Project7Ch8.html">Project 7 Ch8</a>
                <a href="Project8Ch9.html">Project 8 Ch9</a>
                <a href="shopping.php">Shopping Calculator</a>
            </nav>
        </div>

        <!--  Title Banner-->
        <div class="mainImgContainer">
            <img id="codeImg" src="Images/geometricBlueBackground.jpg" alt="JavaScript Code">
            <div class="overlayText" style="color:white; font-size:80px;" >Shopping Calculator</div>
        </div>

        <!--  Content title-->
        <div class="PageContainer">
            <div class="contentContainer">

                <!-- Table container -->
                <div id="shoppingCart">

                    <?php
                    // Data items and prices
                    $items = array(
                        array("Oil Candle", 15.00),
                        array("Essential Oil", 15.00),
                        array("Bath Oil", 15.00),
                        array("Bath Bombs", 14.99),
                        array("Foaming Bath", 14.99)
                    );

                    // Declare sales tax rate
                    define("SALES_TAX_RATE", 0.06);

                    // Calculate Sub-total
                    $subTotal = 0;
                    foreach($items as $item) {
                        $subTotal += $item[1];
                    }

                    // Calculate tax
                    $tax = $subTotal * SALES_TAX_RATE;

                    // Calculate total
                    $total = $subTotal + $tax;

                    ?>

                    <h2>Shopping Calculator</h2>

                    <table>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                        </tr>

                        <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?php echo $item[0]; ?></td>
                            <td><?php echo "$".$item[1]; ?></td>
                        </tr>
                        <?php endforeach; ?>

                        <tr>
                            <th>Sub-total</th>
                            <td> <?php echo "$".$subTotal?></td>
                        </tr>
                        <tr>
                            <th>Tax (at 6%)</th>
                            <td> <?php echo "$".$tax ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td> <?php echo $total?></td>
                        </tr>
                    </table>

                </div>
        </div>


        <!--  Footer -->
        <footer>
            <h3>Camila Lopez Gutierrez &bull; Project Web Scripting Languages</h3>
            <h3>2024</h3>
            <p><a href="mailto:cjl2737@email.vccs.edu">cjl2737@email.vccs.edu</a></p>
        </footer>
    </body>
</html>
