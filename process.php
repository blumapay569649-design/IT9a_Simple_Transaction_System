<?php
function getSubtotal($p, $q) {
    return $p * $q;
}

function getDiscount($subtotal) {
    return ($subtotal > 1000) ? ($subtotal * 0.10) : 0;
}

function getTax($amount) {
    return $amount * 0.12;
}

function getFinalAmount($subtotal, $discount, $tax) {
    return ($subtotal - $discount) + $tax;
}

function formatHeading($text) {
    return "<h3>" . $text . "</h3>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $raw_name = htmlspecialchars($_POST['item_name']);
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $subtotal = getSubtotal($price, $quantity);
    $discount = getDiscount($subtotal);
    $tax = getTax($subtotal - $discount);
    $finalTotal = getFinalAmount($subtotal, $discount, $tax);

    $itemName = strtoupper($raw_name);

    echo formatHeading("Transaction Summary");
    echo "Item Name: " . $itemName . "<br>";
    
    echo "Price: $" . number_format($price, 2) . "<br>";
    echo "Quantity: " . $quantity . "<br>";
    echo "----------------------------<br>";
    echo "Subtotal: $" . number_format($subtotal, 2) . "<br>";
    echo "Discount (10% if > $1000): -$" . number_format($discount, 2) . "<br>";
    echo "Tax (12%): $" . number_format($tax, 2) . "<br>";
    echo "<strong>Final Amount: $" . number_format($finalTotal, 2) . "</strong><br>";
    
    echo "<br><a href='index.php'>New Transaction</a>";
} else {
    echo "No data received.";
}
?>