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

    $sql = "INSERT INTO restaurants (name, email, phone, address, type, registration_date, time) 
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
} else {
    echo "<p style='color:red;'>Invalid request method.</p>";
}
?>
