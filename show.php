<?php
$con = mysqli_connect("localhost", "root", "", "aqi");
$selectedCities = $_POST['city'] ?? [];

if (count($selectedCities) > 10) {
    echo "<script>alert('You can select a maximum of 10 cities.'); window.location.href='request.php';</script>";
    exit();
}

$cityList = [];
if (!empty($selectedCities)) {
    
    foreach ($selectedCities as $city) {
        $cityList[] = "'" . mysqli_real_escape_string($con, $city) . "'";
    }
    $cityStr = implode(",", $cityList);
    $sql = "SELECT `City`, `Country`, `AQI` FROM `info` WHERE City IN ($cityStr)";
    $result = mysqli_query($con, $sql);
} else {
    $result = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Show AQI Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }
        table {
            border-collapse: collapse;
            margin: 30px auto 10px auto;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            width: 80%;
            max-width: 700px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 18px;
            text-align: center;
        }
        th {
            background: #007bff;
            color: #fff;
            font-size: 18px;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #e6f7ff;
        }
        .button-container {
            text-align: right;
            margin: 20px;
        }
        .button-container button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }
        .button-container button.logout {
            background: #dc3545;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button onclick="window.location.href='request.php'" style="background:#6c757d;color:#fff;border:none;padding:10px 20px;border-radius:5px;cursor:pointer;margin-right:10px;">Back</button>
        <button onclick="window.location.href='index.html'" class="logout">Logout</button>
    </div>
    <h2>AQI Data for Selected Cities</h2>
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
    <table>
        <tr>
            <th>City</th>
            <th>Country</th>
            <th>AQI</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['City']) ?></td>
            <td><?= htmlspecialchars($row['Country']) ?></td>
            <td><?= htmlspecialchars($row['AQI']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
        <p style="text-align:center; color:red;">No data found for the selected cities.</p>
    <?php endif; ?>
</body>
</html>