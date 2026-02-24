<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Store Transaction</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 350px; }
        h2 { color: #333; text-align: center; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; color: #555; }
        input { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; transition: background 0.3s; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Transaction</h2>
        <form action="process.php" method="POST">
            <label>Item Name</label>
            <input type="text" name="item_name" placeholder="???" required>

            <label>Price ($)</label>
            <input type="number" name="price" step="0.01" placeholder="0.00" required>

            <label>Quantity</label>
            <input type="number" name="quantity" placeholder="1" required>

            <button type="submit">Process Payment</button>
        </form>
    </div>
</body>
</html>
