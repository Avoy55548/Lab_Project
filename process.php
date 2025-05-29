<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['fullName'])) {
        $_SESSION['fullName'] = htmlspecialchars($_POST['fullName'] ?? '');
        $_SESSION['email'] = htmlspecialchars($_POST['email'] ?? '');
        $_SESSION['password1'] = htmlspecialchars($_POST['password1'] ?? '');
        $_SESSION['password2'] = htmlspecialchars($_POST['password2'] ?? '');
        $_SESSION['dob'] = htmlspecialchars($_POST['dob'] ?? '');
        $_SESSION['location'] = htmlspecialchars($_POST['location'] ?? '');
        $_SESSION['zipCode'] = htmlspecialchars($_POST['zipCode'] ?? '');
        $_SESSION['city'] = htmlspecialchars($_POST['city'] ?? '');
        $_SESSION['color'] = htmlspecialchars($_POST['color'] ?? '');
    }

    //...................
    $fullName = htmlspecialchars($_POST['fullName'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password1 = htmlspecialchars($_POST['password1'] ?? '');
    $password2 = htmlspecialchars($_POST['password2'] ?? '');
    $dob = htmlspecialchars($_POST['dob'] ?? '');
    $location = htmlspecialchars($_POST['location'] ?? '');
    $zipCode = htmlspecialchars($_POST['zipCode'] ?? '');
    $city = htmlspecialchars($_POST['city'] ?? '');
    $color = htmlspecialchars($_POST['color'] ?? '');
    $agreement = isset($_POST['agreement']) ? "Yes" : "No";

    if (isset($_POST["confirm"])) {
        // getting data from session
        $fullName = $_SESSION['fullName'];
        $Email = $_SESSION['email'];
        $Password1 = $_SESSION['password1'];
        $dob = $_SESSION['dob'];
        $location = $_SESSION['location'];
        $zipCode = $_SESSION['zipCode'];
        $city = $_SESSION['city'];
        $Color = $_SESSION['color'];

        $con = mysqli_connect("localhost", "root", "", "aqi");
        // Check if email already exists
        $check_sql = "SELECT 1 FROM `user` WHERE `Email` = '" . mysqli_real_escape_string($con, $Email) . "' LIMIT 1";
        $check_result = mysqli_query($con, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            $emailError = "Email already exists.";
        } else {
            // inserting into database
            $sql = "INSERT INTO `user`(`Full Name`, `Email`, `Password`, `DOB`, `Location`, `Zip Code`, `City`) 
            VALUES ('$fullName', '$Email', '$Password1', '$dob', '$location', '$zipCode', '$city')";
            if (mysqli_query($con, $sql)) {
                echo "<div class='success-msg'>Inserted....</div>";
            }
            //Cookie color fix
            setcookie('bgcolor', $Color, time()+3600, "/");
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Submission</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f7f7f7;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 500px;
                margin: 40px auto;
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 2px 16px rgba(0,0,0,0.10);
                padding: 32px 36px 24px 36px;
            }
            h1 {
                text-align: center;
                color: #007bff;
                margin-bottom: 24px;
            }
            .info-list {
                list-style: none;
                padding: 0;
                margin-bottom: 24px;
            }
            .info-list li {
                margin-bottom: 12px;
                font-size: 18px;
                color: #333;
                background: #f2f8ff;
                border-radius: 6px;
                padding: 10px 16px;
            }
            .label {
                font-weight: bold;
                color: #0056b3;
            }
            .actions {
                display: flex;
                justify-content: space-between;
                margin-top: 24px;
            }
            .actions form, .actions a {
                margin: 0;
            }
            .actions input[type="submit"], .actions a {
                background: #007bff;
                color: #fff;
                border: none;
                padding: 10px 28px;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                text-decoration: none;
                transition: background 0.2s;
            }
            .actions input[type="submit"]:hover, .actions a:hover {
                background: #0056b3;
            }
            .actions .cancel {
                background: #dc3545;
            }
            .actions .cancel:hover {
                background: #a71d2a;
            }
            .success-msg {
                text-align: center;
                color: #28a745;
                font-weight: bold;
                margin-bottom: 16px;
            }
            .error-msg {
                text-align: center;
                color: #dc3545;
                font-weight: bold;
                margin-bottom: 16px;
            }
        </style>
        <script>
        // Set background color from cookie if exists
        document.addEventListener('DOMContentLoaded', function() {
            function getCookie(name) {
                let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                if (match) return decodeURIComponent(match[2]);
                return null;
            }
            var bgcolor = getCookie('bgcolor');
            if (bgcolor) {
                document.body.style.background = bgcolor;
            }
        });
        </script>
    </head>
    <body>
        <div class="container">
            <h1>Form Submission Received</h1>
            <div id="emailError" class="error-msg">
                <?php if (!empty($emailError)) echo $emailError; ?>
            </div>
            <ul class="info-list">
                <li><span class="label">Full Name:</span> <?= $fullName ?></li>
                <li><span class="label">Email:</span> <?= $email ?></li>
                <li><span class="label">Date of Birth:</span> <?= $dob ?></li>
                <li><span class="label">Location:</span> <?= $location ?></li>
                <li><span class="label">City:</span> <?= $city ?></li>
                <li><span class="label">Zip Code:</span> <?= $zipCode ?></li>
                <li><span class="label">Favorite Color:</span> <span style="display:inline-block;width:18px;height:18px;border-radius:50%;background:<?= htmlspecialchars($color) ?>;vertical-align:middle;margin-right:6px;"></span><?= $color ?></li>
                <li><span class="label">Agreed to Terms:</span> <?= $agreement ?></li>
            </ul>
            <div class="actions">
                <form action="process.php" method="post" style="display:inline;">
                    <input type="submit" name="confirm" value="Confirm">
                </form>
                <a href="index.html" class="cancel">Cancel</a>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "No form data submitted.";
}
?>