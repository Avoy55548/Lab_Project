<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Submission</title>
</head>
<body>
  <h1>User Input</h1>

  <?php

if (isset($_POST['submit'])) {

    // Collect and validate individual inputs
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $password1 = $_POST['password1'] ?? '';
    $password2 = $_POST['password2'] ?? '';
    $location = $_POST['location'] ?? '';
    $zipCode = $_POST['zipCode'] ?? '';
    $city = $_POST['city'] ?? '';
    
    $agreement = isset($_POST['agreement']) ? 'Agreed' : 'Not agreed';

    // Check for required fields
    if ($fullName != "" && $email != "" && $password1 != "" && $password1 == $password2) {
        echo "<h2>Submitted Data:</h2>";
        echo "Full Name: " . $fullName . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Location: " . $location . "<br>";
        echo "Zip Code: " . $zipCode . "<br>";
        echo "Preferred City: " . $city . "<br>";
        
        echo "Agreement: " . $agreement . "<br>";
    } else {
        echo "NO DATA or Missing Fields";
    }

} else {
    echo "NO DATA - Submit button not clicked";
}
?>


</body>
</html>
