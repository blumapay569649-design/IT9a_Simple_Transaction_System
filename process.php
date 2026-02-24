<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction Receipt</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .receipt { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 400px; }
        .header { border-bottom: 2px dashed #eee; padding-bottom: 10px; margin-bottom: 20px; text-align: center; }
        .row { display: flex; justify-content: space-between; margin-bottom: 10px; color: #444; }
        .total-row { border-top: 2px solid #333; margin-top: 15px; padding-top: 10px; font-weight: bold; font-size: 1.2em; color: #000; }
        .btn-back { display: block; text-align: center; margin-top: 20px; text-decoration: none; color: #4CAF50; font-weight: bold; }
    </style>
</head>
<body>
    <div class="receipt">
        <?php
        function computeSubtotal($p, $q) { return $p * $q; }
        function computeDiscount($sub) { return ($sub > 1000) ? ($sub * 0.10) : 0; }
        function computeTax($amount) { return $amount * 0.12; }
        function computeFinal($sub, $disc, $tax) { return ($sub - $disc) + $tax; }
        function displayLabel($text) { return "<div class='header'><h2>" . $text . "</h2></div>"; }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $item = htmlspecialchars($_POST['item_name']);
            $price = $_POST['price'];
            $qty = $_POST['quantity'];

            $subtotal = computeSubtotal($price, $qty);
            $discount = computeDiscount($subtotal);
            $tax = computeTax($subtotal - $discount);
            $total = computeFinal($subtotal, $discount, $tax);

            echo displayLabel("Official Receipt");
            
            echo "<div class='row'><span>Item:</span> <span>" . strtoupper($item) . "</span></div>";
            
            echo "<div class='row'><span>Unit Price:</span> <span>$" . number_format($price, 2) . "</span></div>";
            echo "<div class='row'><span>Quantity:</span> <span>" . $qty . "</span></div>";
            echo "<div class='row'><span>Subtotal:</span> <span>$" . number_format($subtotal, 2) . "</span></div>";
            echo "<div class='row' style='color:red;'><span>Discount (10%):</span> <span>-$" . number_format($discount, 2) . "</span></div>";
            echo "<div class='row'><span>Tax (12%):</span> <span>$" . number_format($tax, 2) . "</span></div>";
            
            echo "<div class='row total-row'><span>Total to Pay:</span> <span>$" . number_format($total, 2) . "</span></div>";
            
            echo "<a href='index.php' class='btn-back'>← Back to Store</a>";
        }
        ?>
    </div>
</body>
</html>
