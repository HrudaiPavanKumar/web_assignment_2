<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Restaurant Registration</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .form-container {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 400px;
            }

            h1 {
                text-align: center;
                color: #333;
            }

            label {
                display: block;
                margin: 10px 0 5px;
                font-weight: bold;
            }

            input, textarea, button {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            button {
                background-color: #28a745;
                color: white;
                border: none;
                cursor: pointer;
            }

            button:hover {
                background-color: #218838;
            }

            #response {
                margin-top: 20px;
                padding: 10px;
                display: none;
                border-radius: 4px;
            }

        </style>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $type = htmlspecialchars($_POST['type']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurant_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO restaurants (name, email, phone, address, type, date, time) 
            VALUES ('$name', '$email', '$phone', '$address', '$type', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Registration successful!</p>";
        echo "<p><strong>Restaurant Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Cuisine:</strong> $type</p>";
        echo "<p><strong>Registration Date:</strong> $date</p>";
        echo "<p><strong>Preferred Time Schedule:</strong> $time</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $conn->close();
} 
?>

    <div class="form-container">
        <h1>Restaurant Registration Form</h1>
        <form id="restaurantForm" method="post" action="submit.php"  >
            <label for="name">Restaurant Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="type">Type of Cuisine:</label>
            <input type="text" id="type" name="type" required>

            <label for="date">Registration Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Preferred Time Schedule:</label>
            <input type="time" id="time" name="time" required>

            <button type="submit" id="submitBtn">Register</button>
        </form>
        <div id="response"></div>
    </div>
</body>
</html>
