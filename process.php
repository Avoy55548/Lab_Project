<?php

echo "Hi " . $_POST['fullName'];
echo "<br>Email: " . $_POST['email'];
echo "<br>Password: " . $_POST['password1'];
echo "<br>Confirm Password: " . $_POST['password2'];
echo "<br>Location: " . $_POST['location'];
echo "<br>Zip Code: " . $_POST['zipCode'];
echo "<br>Preferred City: " . $_POST['city'];
echo "<br>Selected Color: " . $_POST['color'];


if (isset($_POST['agreement'])) {
    echo "<br>Agreed to Terms: Yes";
} else {
    echo "<br>Agreed to Terms: No";
}


var_dump($_GET);

if (isset($_POST['submit'])) {
    if ($_POST['fullName'] != "") {
        echo "<br>Submitted Name Again: " . $_POST['fullName'];
    } else {
        print_r("<br>NO DATA");
    }
}
?>
