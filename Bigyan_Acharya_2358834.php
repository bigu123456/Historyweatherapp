<!DOCTYPE html>
<html>
<head>
    <title>Weather Data Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: black; /* Black background for the table */
            color: white; /* White text color for table content */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4caf50; /* Green background for table heading */
            color: white; /* White text color for table heading */
        }
        th:hover {
            background-color: #45a049; /* Darker green background on hover */
        }
        td {
            background-color: #2a2a2a; /* Dark gray background for table content */
            transition: background-color 0.3s, color 0.3s;
        }
        td:hover {
            background-color: #555; /* Slightly darker gray on hover */
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #4caf50;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #45a049;
            color: white;
        }
    </style>
</head>

<body>

<a href="Bigyan_Acharya_2358834.html">Go to Weather App</a>

<h2>Searched weather data</h2>

<table>
    <tr>
        <th>ID</th>
        <th>City Name</th>
        <th>Temperature °C</th>
        <th>Humidity %</th>
        <th>Pressure pa</th>
        <th>Wind Speed km/hr</th>
        <th>Timestamp</th>
    </tr>

    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bigu"; // Name of the database you created

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve data
    $sql = "SELECT * FROM WeatherData";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["temperature"] . "</td>";
            echo "<td>" . $row["humidity"] . "</td>";   
            echo "<td>" . $row["pressure"] . "</td>";
            echo "<td>" . $row["wind_speed"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data available</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>
