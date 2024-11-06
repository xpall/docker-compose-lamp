<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LAMP STACK</title>
        <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/svg+xml">
        <link rel="stylesheet" href="/assets/css/bulma.min.css">
    </head>
    <body style="background-color: #696969; height: 100vh">
       <?php echo $_SERVER["PHP_SELF"]; ?>
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="firstNum">Enter first number</label>
            <input type="text" name="firstNum" required>
            <br>
            <label for="operation">Select an operation</label>
            <select name="operation" required>
                <option value="addition">+</option>
                <option value="subtraction">-</option>
                <option value="multiplication">*</option>
                <option value="division">/</option>
                <option value="exponentiation">^</option>
            </select>
            <br>
            <label for="secondNum">Enter second number</label>
            <input type="text" name="secondNum" required>
            <br>
            <button type="submit">Calculate</button>
       </form>
        <?php 
        // Assign variables
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstNum = floatval(filter_input(INPUT_POST, "firstNum", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
            $operation = htmlspecialchars($_POST["operation"]);
            $secondNum = floatval(filter_input(INPUT_POST, "secondNum", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        };

        // Error handlers
        $hasErrors = false;
        $availableOperations = ["addition", "subtraction", "multiplication", "division", "exponentiation"];
        
        // Check if data are valid
        if (!is_float($firstNum) && !in_array($operation, $availableOperations) && !is_float($secondNum)) {
            $hasErrors = true;
            echo "<p>Enter a valid numbers</p>";
        };

        // Check if input fields have data
        if (empty($firstNum) || empty($operation) || empty($secondNum)) {
            $hasErrors = true;
            echo "<p>Fill up all fields</p>";
        };

        // Proceed with operation if there are no errors
        $answer = 0;
        if ($hasErrors == false) {
            switch ($operation) {
                case "addition":
                    $answer = $firstNum + $secondNum;
                    break;
                case "subtraction":
                    $answer = $firstNum - $secondNum;
                    break;
                case "multiplication":
                    $answer = $firstNum * $secondNum;
                    break;
                case "division":
                    $answer = $firstNum / $secondNum;
                    break;
                case "exponentiation":
                    $answer = $firstNum ** $secondNum;
                    break;
                
                default:
                    $answer = 0;
            }
            echo $answer;
        };





        ?>

    </body>
</html>
