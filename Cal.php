<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator by Naveen </title>
    <style>
        /* Animation for the background gradient */
        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;  /* Start position of the gradient */
            }
            50% {
                background-position: 100% 50%;  /* Middle position of the gradient */
            }
            100% {
                background-position: 0% 50%;  /* End position of the gradient */
            }
        }

        /* Style for the body, adding gradient background with animation */
        body {
            font-family: Arial, sans-serif;  /* Font choice for the page */
            background: linear-gradient(45deg, #6a11cb, #2575fc, #ff6a00, #ff1a6b); /* Colorful gradient */
            background-size: 300% 300%;  /* To make the gradient fill a larger space */
            animation: gradientBackground 10s ease infinite; /* Smooth transition animation for the gradient */
            color: white;  /* Text color set to white for contrast */
            margin: 0;
            padding: 0;
            display: flex;  /* Flexbox for centering the content */
            justify-content: center;
            align-items: center;
            height: 100vh;  /* Full viewport height */
            text-align: center;  /* Center the text horizontally */
        }

        /* Mobile device frame styling */
        .device-frame {
            width: 400px;  /* Set width for the frame */
            max-width: 90%;  /* Make sure it's responsive */
            height: 700px;  /* Fixed height to resemble a mobile */
            background-color: #333;  /* Dark background for the frame */
            border-radius: 30px;  /* Rounded corners for a sleek design */
            padding: 20px;  /* Padding inside the frame */
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5);  /* Soft shadow for a realistic look */
            display: flex;
            justify-content: center;  /* Centering content */
            align-items: center;
            position: relative;  /* To position the top notch and bottom button */
        }

        /* Styling for the top notch of the device */
        .device-frame:before {
            content: "";
            position: absolute;
            top: 10px;  /* Positioning the notch at the top */
            width: 60px;
            height: 8px;
            background-color: #666;  /* Dark gray color for the notch */
            border-radius: 10px;  /* Rounded edges for the notch */
        }

        /* Styling for the circular home button at the bottom */
        .device-frame:after {
            content: "";
            position: absolute;
            bottom: 10px;  /* Position the button at the bottom */
            width: 40px;
            height: 40px;
            background-color: #666;  /* Dark gray color for the button */
            border-radius: 50%;  /* Circular shape for the button */
        }

        /* Page wrapper styling */
        #page-wrap {
            background-color: rgba(0, 0, 0, 0.7);  /* Slightly transparent black background */
            padding: 30px;  /* Padding around the content */
            border-radius: 10px;  /* Rounded corners for the wrapper */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);  /* Shadow around the content */
            width: 100%;
            max-width: 350px;  /* Maximum width for smaller screens */
        }

        /* Styling for the title of the calculator */
        h1 {
            font-size: 2rem;  /* Larger font size for the title */
            margin-bottom: 20px;  /* Space below the title */
            color: #FFD700;  /* Golden yellow color for the title */
        }

        /* Styling for input fields */
        input[type="number"] {
            width: 100%;  /* Make input fields full-width */
            padding: 10px;  /* Padding inside the input field */
            margin: 10px 0;  /* Margin around the input fields */
            border-radius: 5px;  /* Rounded corners */
            border: 1px solid #ddd;  /* Light border for input fields */
            font-size: 16px;  /* Font size for number input */
        }

        /* Styling for the submit buttons */
        input[type="submit"] {
            background-color: #FFD700;  /* Golden background color */
            border: none;  /* Remove default border */
            color: white;  /* White text on buttons */
            padding: 15px;  /* Padding inside the buttons */
            margin: 10px 5px;  /* Margin around buttons */
            width: 45%;  /* Set width to 45% to align buttons neatly */
            font-size: 16px;  /* Font size for button text */
            border-radius: 5px;  /* Rounded corners for the buttons */
            cursor: pointer;  /* Pointer cursor on hover */
            transition: background 0.3s ease;  /* Smooth hover effect */
        }

        /* Hover effect for buttons */
        input[type="submit"]:hover {
            background-color: #ffcc00;  /* Change background color on hover */
        }

        /* Styling for the result box */
        .result-box {
            width: 100%;
            padding: 10px;  /* Padding inside the result box */
            margin: 10px 0;  /* Margin around the result box */
            border-radius: 5px;  /* Rounded corners */
            border: 1px solid #ddd;  /* Light border for the result box */
            font-size: 16px;  /* Font size for the result */
            background-color: #f0f0f0;  /* Light gray background */
            color: black;  /* Black text color */
        }

        /* Responsive design tweaks for smaller screens */
        @media (max-width: 600px) {
            .device-frame {
                width: 100%;  /* Make the device frame full width on small screens */
                height: 90vh;  /* Adjust height for small screens */
            }

            #page-wrap {
                padding: 15px;  /* Reduce padding for smaller screens */
                max-width: 90%;  /* Set maximum width to 90% */
            }

            h1 {
                font-size: 1.5rem;  /* Adjust title font size */
            }
        }
    </style>
</head>
<body>

<?php
$Result = ""; // Initialize the result variable to empty

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Check if the form has been submitted
    // Get the input values from the form
    $Number_no_1 = $_POST['Number_no_1'];
    $Number_no_2 = $_POST['Number_no_2'];
    $operator_specified = $_POST['operator_specified'];

    // Function to perform the calculation based on the operator
    function MyCalculator($Number1, $Number2, $operator) {
        switch ($operator) {
            case "Addition":
                return $Number1 + $Number2;  // Return the sum
            case "Subtraction":
                return $Number1 - $Number2;  // Return the difference
            case "Multiplication":
                return $Number1 * $Number2;  // Return the product
            case "Division":
                if ($Number2 == 0) {
                    return "Cannot divide by zero";  // Handle division by zero
                }
                return $Number1 / $Number2;  // Return the quotient
            default:
                return "Invalid operation";  // Default error message if an invalid operation is selected
        }
    }

    // Call the calculator function and store the result
    $Result = MyCalculator($Number_no_1, $Number_no_2, $operator_specified);
}
?>

<!-- The device frame containing the calculator form -->
<div class="device-frame">
    <div id="page-wrap">
        <h1>Calculator by Naveen</h1>  <!-- Title of the calculator -->
        <form action="" method="post" id="quiz-form">
            <!-- Input for the first number -->
            <p>
                <input type="number" name="Number_no_1" id="Number_no_1" required="required" value="<?php echo isset($Number_no_1) ? $Number_no_1 : ''; ?>" />
                <b>First Number</b>  <!-- Label for the first number input -->
            </p>
            <!-- Input for the second number -->
            <p>
                <input type="number" name="Number_no_2" id="Number_no_2" required="required" value="<?php echo isset($Number_no_2) ? $Number_no_2 : ''; ?>" />
                <b>Second Number</b>  <!-- Label for the second number input -->
            </p>
            <!-- Display the result of the calculation -->
            <p>
                <input readonly="readonly" name="CalculatorResult" value="<?php echo isset($Result) ? $Result : ''; ?>" class="result-box" />
                <b>Calculator Result</b>  <!-- Label for the result input -->
            </p>
            <!-- Buttons for each operation -->
            <input type="submit" name="operator_specified" value="Addition" />
            <input type="submit" name="operator_specified" value="Subtraction" />
            <input type="submit" name="operator_specified" value="Multiplication" />
            <input type="submit" name="operator_specified" value="Division" />
        </form>
    </div>
</div>

</body>
</html>
