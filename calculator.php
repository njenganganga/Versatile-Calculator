<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture and sanitize user input
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : null;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : null;
    $operation = $_POST['operation'];
    $result = '';

    // Perform calculations based on the selected operation
    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = 'Error: Division by zero';
            }
            break;
        case 'exponentiation':
            $result = pow($num1, $num2);
            break;
        case 'percentage':
            $result = ($num1 * $num2) / 100;
            break;
        case 'square_root':
            $result = sqrt($num1);
            break;
        case 'logarithm':
            if ($num1 > 0) {
                $result = log($num1);
            } else {
                $result = 'Error: Logarithm of non-positive number';
            }
            break;
        default:
            $result = 'Invalid Operation';
            break;
    }

    // Set the result in the POST array to be displayed in the HTML
    $_POST['result'] = $result;

    // Include the HTML file to display the result
    include 'index.html';
}
?>
