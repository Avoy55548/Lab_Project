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

    echo "<h1>Form Submission Received</h1>";
    echo "<p><strong>Full Name:</strong> $fullName</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>Location:</strong> $location</p>";
    echo "<p><strong>City:</strong> $city</p>";
    echo "<p><strong>Zip Code:</strong> $zipCode</p>";
    echo "<p><strong>Favorite Color:</strong> $color</p>";
    echo "<p><strong>Agreed to Terms:</strong> $agreement</p>";
} 
else {
    echo "No form data submitted.";
}
?>
