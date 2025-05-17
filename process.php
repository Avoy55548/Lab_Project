<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        
        setcookie('color', $color);

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
            <input type="submit" name="confirm" value="Confirm">
        </form>
        <button><a href="index.html" style="text-decoration: none; color: inherit;">Cancel</a></button>
    </body>
    </html>

    <?php
} else {
    echo "No form data submitted.";
}
?>
