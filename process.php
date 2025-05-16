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

    echo "Hi " . $fullName . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Password: " . $password1 . "<br>";
    echo "Confirm Password: " . $password2 . "<br>";
    echo "Date of Birth: " . $dob . "<br>";
    echo "Location: " . $location . "<br>";
    echo "Zip Code: " . $zipCode . "<br>";
    echo "Preferred City: " . $city . "<br>";
    echo "Selected Color: <span style='background-color: $color; padding: 0 10px;'>&nbsp;</span> " . $color . "<br>";
    echo "Agreed to Terms: " . $agreement . "<br>";
} else {
    echo "No form data submitted.";
}
?>
