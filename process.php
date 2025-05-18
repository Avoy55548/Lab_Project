<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
if (isset($_POST['fullName'])) {
 $_SESSION['fullName'] = htmlspecialchars($_POST['fullName'] ?? '');
    $_SESSION['email'] = htmlspecialchars($_POST['email'] ?? '');
    $_SESSION['password1'] = htmlspecialchars($_POST['password1'] ?? '');
    $_SESSION['password2']= htmlspecialchars($_POST['password2'] ?? '');
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
        $Email= $_SESSION['email'];
        $Password1 = $_SESSION['password1'];
        $dob = $_SESSION['dob'];
        $location = $_SESSION['location'];
        $zipCode = $_SESSION['zipCode'];    
        $city = $_SESSION['city'];
        $Color = $_SESSION['color'];

        // inserting into database
        $con = mysqli_connect("localhost", "root", "", "aqi");
        $sql = "INSERT INTO `user`(`Full Name`, `Email`, `Password`, `DOB`, `Location`, `Zip Code`, `City`) 
        VALUES ('$fullName', '$Email', '$Password1', '$dob', '$location', '$zipCode', '$city')";
        if (mysqli_query($con, $sql)) {
            echo "Inserted....";
        }
        //Cookie color fix
        setcookie('bgcolor', $Color, time()+10);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Submission</title>
    </head>

    <body>
        <h1>Form Submission Received</h1>
        <p><strong>Full Name:</strong> <?= $fullName ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Date of Birth:</strong> <?= $dob ?></p>
        <p><strong>Location:</strong> <?= $location ?></p>
        <p><strong>City:</strong> <?= $city ?></p>
        <p><strong>Zip Code:</strong> <?= $zipCode ?></p>
        <p><strong>Favorite Color:</strong> <?= $color ?></p>
        <p><strong>Agreed to Terms:</strong> <?= $agreement ?></p>
        <form action="process.php" method="post">
            <input type="submit" name="confirm" value="confirm">
        </form>
        <button><a href="index.html" style="text-decoration: none; color: inherit;">Cancel</a></button>
    </body>

    </html>

    <?php
}
 else {
    echo "No form data submitted.";
}
?>