<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            margin-top: 10px;
            line-height: 1.6;
        }
        .button-container {
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            margin: 0 10px;
            padding: 8px 16px;
            font-size: 14px;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .button.logout {
            background-color: #f44336;
        }
        .button.logout:hover {
            background-color: #d32f2f;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 Payment Successful! 🎉</h1>
        <p>Thank you so much for choosing our service from RAWNAQ. We truly appreciate your trust and hope you have an amazing day! 😊</p>
        <p>If you need any assistance, feel free to reach out to us anytime.</p>
        <div class="button-container">
            <button class="button" onclick="history.back()">Back</button>
            <a href="logout.php" class="button logout">Log Out</a>
        </div>
    </div>
</body>
</html>
