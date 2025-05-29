<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
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
        input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 30px;
            margin-top: 10px;
            transition: background 0.2s;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            transition: background 0.2s;
        }
        button:hover {
            background: #0056b3;
        }
        .button-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
            margin-top: 20px;
            margin-bottom: -20px;
        }
    </style>
    
</head>
<body>
    <div class="button-container">
        <button onclick="window.location.href='index.html'" style="background:#6c757d;color:#fff;border:none;padding:10px 20px;border-radius:5px;cursor:pointer;margin-right:10px;">Back</button>
        <button onclick="window.location.href='index.html'" style="background:#dc3545;color:#fff;border:none;padding:10px 20px;border-radius:5px;cursor:pointer;">Logout</button>
    </div>
    <h2>Select City And Country </h2>
    <form action="show.php" method="post">
        <table>
            <tr>
                <th>Country</th>
                <th>City</th>
                <th>CheckBox</th>
            </tr>
            <tr><td>Bangladesh</td><td>Dhaka</td><td><input type="checkbox" name="city[]" value="Dhaka"></td></tr>
            <tr><td>Bangladesh</td><td>Mymensingh</td><td><input type="checkbox" name="city[]" value="Mymensingh"></td></tr>
            <tr><td>Bangladesh</td><td>Narsingdi</td><td><input type="checkbox" name="city[]" value="Narsingdi"></td></tr>
            <tr><td>Bangladesh</td><td>Barisal</td><td><input type="checkbox" name="city[]" value="Barisal"></td></tr>
            <tr><td>Bangladesh</td><td>Sylhet</td><td><input type="checkbox" name="city[]" value="Sylhet"></td></tr>
            <tr><td>Bangladesh</td><td>Rajshahi</td><td><input type="checkbox" name="city[]" value="Rajshahi"></td></tr>
            <tr><td>Singapore</td><td>South, Singapore</td><td><input type="checkbox" name="city[]" value="South, Singapore"></td></tr>
            <tr><td>Singapore</td><td>North, Singapore</td><td><input type="checkbox" name="city[]" value="North, Singapore"></td></tr>
            <tr><td>Nepal</td><td>Kathmandu</td><td><input type="checkbox" name="city[]" value="Kathmandu"></td></tr>
            <tr><td>Nepal</td><td>Pokhara</td><td><input type="checkbox" name="city[]" value="Pokhara"></td></tr>
            <tr><td>India</td><td>Thane</td><td><input type="checkbox" name="city[]" value="Thane"></td></tr>
            <tr><td>India</td><td>Hyderabad</td><td><input type="checkbox" name="city[]" value="Hyderabad"></td></tr>
            <tr><td>India</td><td>Lucknow</td><td><input type="checkbox" name="city[]" value="Lucknow"></td></tr>
            <tr><td>China</td><td>Xiangyang</td><td><input type="checkbox" name="city[]" value="Xiangyang"></td></tr>
            <tr><td>Malaysia</td><td>Kuantan</td><td><input type="checkbox" name="city[]" value="Kuantan"></td></tr>
            <tr><td>Hong Kong</td><td>Tai Po</td><td><input type="checkbox" name="city[]" value="Tai Po"></td></tr>
            <tr><td>Hong Kong</td><td>Sha Tin</td><td><input type="checkbox" name="city[]" value="Sha Tin"></td></tr>
            <tr><td>Turkey</td><td>Kestel</td><td><input type="checkbox" name="city[]" value="Kestel"></td></tr>
            <tr><td>Turkey</td><td>Torbali</td><td><input type="checkbox" name="city[]" value="Torbali"></td></tr>
        </table>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>