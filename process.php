<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Submission Result</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
    }
    .result {
      background-color: #f0f0f0;
      padding: 20px;
      border-radius: 10px;
      width: 60%;
      margin: auto;
    }
    .result h2 {
      color: #333;
    }
    .result p {
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <div class="result">
    <h2>Form Submission Details</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $fullName = htmlspecialchars($_POST["fullName"]);
      $email = htmlspecialchars($_POST["email"]);
      $password1 = htmlspecialchars($_POST["password1"]);
      $password2 = htmlspecialchars($_POST["password2"]);
      $location = htmlspecialchars($_POST["location"]);
      $zipCode = htmlspecialchars($_POST["zipCode"]);
      $city = htmlspecialchars($_POST["city"]);
      $color = htmlspecialchars($_POST["color"]);
      $agreement = isset($_POST["agreement"]) ? "Yes" : "No";

      echo "<p><strong>Full Name:</strong> $fullName</p>";
      echo "<p><strong>Email:</strong> $email</p>";
      echo "<p><strong>Password:</strong> $password1</p>";
      echo "<p><strong>Confirm Password:</strong> $password2</p>";
      echo "<p><strong>Location:</strong> $location</p>";
      echo "<p><strong>Zip Code:</strong> $zipCode</p>";
      echo "<p><strong>Preferred City:</strong> $city</p>";
      echo "<p><strong>Selected Color:</strong> <span style='color:$color;'>$color</span></p>";
      echo "<p><strong>Agreed to Terms:</strong> $agreement</p>";
    } else {
      echo "<p>No data submitted.</p>";
    }
    ?>
  </div>
</body>
</html>
