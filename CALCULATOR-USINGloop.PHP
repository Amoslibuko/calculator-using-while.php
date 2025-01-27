<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
</head>
<body>

    <div class="calculator">
        <h1>Simple Calculator</h1>

        <?php
        $continue = true;

        while ($continue) {
        ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="number" name="num1" placeholder="Enter first number" required><br>
                <select name="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select><br>
                <input type="number" name="num2" placeholder="Enter second number" required><br>
                <button type="submit">Calculate</button>
            </form>

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = $_POST["num1"];
                $num2 = $_POST["num2"];
                $operator = $_POST["operator"];

                switch ($operator) {
                    case "+":
                        $result = $num1 + $num2;
                        break;
                    case "-":
                        $result = $num1 - $num2;
                        break;
                    case "*":
                        $result = $num1 * $num2;
                        break;
                    case "/":
                        if ($num2 == 0) {
                            $result = "Error: Division by zero";
                        } else {
                            $result = $num1 / $num2;
                        }
                        break;
                    default:
                        $result = "Invalid operator";
                }

                echo "<p>Result: " . $result . "</p>";
            }

            ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <button type="submit" name="exit">Exit</button>
            </form>

            <?php

            if (isset($_POST['exit'])) {
                $continue = false;
            }
        }

        ?>

    </div>
    body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</body>
</html>