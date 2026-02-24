<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction Form</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        form { max-width: 300px; border: 1px solid #ccc; padding: 20px; border-radius: 8px; }
        input { display: block; width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; }
        label { font-weight: bold; }
        button { background-color: #28a745; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Store Transaction</h2>
    <form action="process.php" method="POST">
        <label>Item Name:</label>
        <input type="text" name="item_name" required>

        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>

        <label>Quantity:</label>
        <input type="number" name="quantity" required>

        <button type="submit">Process Transaction</button>
    </form>
</body>
</html>