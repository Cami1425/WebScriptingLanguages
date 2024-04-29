<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
           JavaScript 7th Edition
           Chapter 12 PHP
           Project: Phone Bill Calculator

           Author: Camila Lopez
           Date: 31 March 2024

           Filename: phoneBillCalculator.php
        -->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Web Scripting Languages</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css" />
        <script src="WSL.js" defer></script>
    </head>
    <body>

        <!-- Side Nav Bar-->
        <div class="sideNav" id="overlaySideNav">
            <button class="hamburger">&#9776;</button>
            <nav class="menuNav">
                <a href="WSLProjects.html">Main Page</a>
                <a href="Project4Ch5.html">Project 4 Ch5</a>
                <a href="Project5Ch6.html">Project 5 Ch6</a>
                <a href="Project6Ch7.html">Project 6 Ch7</a>
                <a href="Project7Ch8.html">Project 7 Ch8</a>
                <a href="Project8Ch9.html">Project 8 Ch9</a>
                <a href="shopping.php">Shopping Calculator</a>
                <a href="phoneBillCalculator.php">Phone Bill Calculator</a>
            </nav>
        </div>

        <!--  Title Banner-->
        <div class="mainImgContainer">
            <img id="codeImg" src="Images/phoneBilCalculator.jpg" alt="php Code">
            <div class="overlayText" >Phone Bill Calculator</div>
        </div>

        <!--  Content title-->
        <div class="PageContainer">
            <div class="contentContainer">
                <div class="projTitle">Calculate your Phone Bill here</div>
            </div>
        </div>

        <!-- Bill Calculator form -->
        <div class="PageContainer">
            <div class="contentContainer splitScreen">

                <div class="calculatorForm">
                    <form method="post" action="phoneBillCalculator.php" style="width: 200%">
                        <fieldset class="form" style="width: 40%">
                            <label for="package">Select your Package:</label>
                            <select id="package" name="package" size="1">
                                <option value="A">Package A</option>
                                <option value="B">Package B</option>
                                <option value="C">Package C</option>
                                <option value="D">Package D</option>
                            </select><br><br>

                            <label for="minutes">Minutes Used:</label>
                            <input type="number" id="minutes" name="minutes" placeholder='Max 2000'><br><br>
                            <label for="tax">Sales Tax (%):</label>
                            <input type="number" id="tax" name="tax" placeholder='Max 12'><br><br>
                            <input type="submit" name="submit" value="Calculate">
                        </fieldset>
                    </form>
                </div>

                <div id="calculatorTable">
                    <!-- php code -->
                    <?php
                    // Calculate Monthly Phone Bill
                    function calculateMonthlyBill($package, $minutes, $tax)
                    {
                        // Packages details
                        switch ($package) {
                            //Package A: For $20 per month, 400 minutes are provided. Additional minutes are $0.50 per minute.
                            case 'A':
                                $monthly_cost = 20;
                                $minutesIncluded = 400;
                                $additionalMinutesCost = 0.50;
                                break;
                            //Package B: For $30 per month, 600 minutes are provided. Additional minutes are $0.40 per minute.
                            case 'B':
                                $monthly_cost = 30;
                                $minutesIncluded = 600;
                                $additionalMinutesCost = 0.40;
                                break;
                            //Package C: For $40 per month, 900 minutes are provided. Additional minutes are $0.30 per minute.
                            case 'C':
                                $monthly_cost = 40;
                                $minutesIncluded = 900;
                                $additionalMinutesCost = 0.30;
                                break;
                            // Package D: For $50 per month, unlimited minutes are provided.
                            case 'D':
                                $monthly_cost = 50;
                                $minutesIncluded = -1;
                                $additionalMinutesCost = 0;
                                break;
                            default:
                                return "Package not selected";
                        }

                        // Calculate the additional minutes used
                        if ($minutes > $minutesIncluded) {
                            $totalAddMinutesCost = ($minutes - $minutesIncluded) * $additionalMinutesCost;
                        } else {
                            $totalAddMinutesCost = 0;
                        }

                        // Calculate Total
                        $subtotal = $monthly_cost + $totalAddMinutesCost;
                        $totalTax = $tax / 100;
                        return (object) array(
                            'totalAddMinutesCost' => $totalAddMinutesCost,
                            'subtotal' => $subtotal,
                            'total' => $subtotal + $totalTax,
                            'monthly_cost' => $monthly_cost,
                            'minutesIncluded' => $minutesIncluded
                        );
                    }

                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $package = $_POST['package'];
                        $minutes = $_POST['minutes'];
                        $tax = $_POST['tax'];
                        $dropdownError = "";
                        $taxError = "";
                        $minutesError = "";

                        // Validate select drop down
                        if ($package === "" || $package === null) {
                            $dropdownError = "Please choose a valid package";
                        }

                        // Validate minutes
                        if (!is_numeric($minutes) || $minutes < 0 || $minutes >= 2000) {
                            $minutesError = "Please choose a valid minute value. (Max value 2000)";
                        }

                        // Validate tax
                        if (!is_numeric($tax) || $tax < 0 || $tax > 12) {
                            $taxError = "Please choose a valid tax value. (Max value 12)";
                        }

                        // Display errors
                        if ($dropdownError != "" || $minutesError != "" || $taxError != "") {
                            echo "<b>Error:</b>";
                            echo "<br>" . $dropdownError;
                            echo "<br>" . $minutesError;
                            echo "<br>" . $taxError;
                        } else {
                            $totalCost = calculateMonthlyBill($package, $minutes, $tax);

                            // Process the form data
                            echo <<<_END
                                <div id="calculator">
                                   
                                    <!-- Calculator table -->
                                    <table style="width: 100%">
                                        <tr>
                                            <th colspan="2" style="font-size:1.3em">Phone Bill</th>
                                        <tr>
                                            <td>Package $package</ td>
                                            <td>$$totalCost->monthly_cost</td>
                                        </tr>
                                        <tr>
                                            <td>Additional Minutes Cost</td>
                                            <td>$$totalCost->totalAddMinutesCost</td>
                                        </tr>
                                        <tr>
                                            <td class="bolds" >Sub-total</td>
                                            <td>$$totalCost->subtotal</td>
                                        </tr>
                                        <tr>
                                            <td class="bolds" >Tax ($tax%)</td>
                                            <td>$$tax</td>
                                        </tr>
                                        <tr>
                                            <td class="bolds" >Total</td>
                                            <td class="bolds" >$$totalCost->total</td>
                                        </tr>
                                    </table>
                                </div>
                                _END;

                        }
                    }

                    ?>
                </div>
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
