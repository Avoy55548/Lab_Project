<?php
$con = mysqli_connect("localhost", "root", "", "aqi");
$sql = "SELECT `ID`, `City`, `Country`, `AQI` FROM `info` WHERE Country='Bangladesh' OR Country='Nepal'";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Show AQI Data</title>
</head>
<body>
    <h2>AQI Data for Bangladesh and Nepal</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>City</th>
            <th>Country</th>
            <th>AQI</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['ID']) ?></td>
            <td><?= htmlspecialchars($row['City']) ?></td>
            <td><?= htmlspecialchars($row['Country']) ?></td>
            <td><?= htmlspecialchars($row['AQI']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>