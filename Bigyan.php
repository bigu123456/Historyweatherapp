<?php
// Receive data from JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bigu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the received data is valid
if (
    isset($data['name']) &&
    isset($data['main']['temp']) &&
    isset($data['main']['humidity']) &&
    isset($data['main']['pressure']) &&
    isset($data['wind']['speed'])
) {
    // Extract pressure value
    $pressure = $data['main']['pressure'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO WeatherData (city, temperature, humidity, pressure, wind_speed)
            VALUES (
                '" . $data['name'] . "',
                '" . $data['main']['temp'] . "',
                '" . $data['main']['humidity'] . "',
                '" . $pressure . "',
                '" . $data['wind']['speed'] . "'
            )";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully into the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Invalid data format.";
}

$conn->close();
?>
