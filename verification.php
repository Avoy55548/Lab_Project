<?php
session_start();
if (session_status() >= 0) {
    if (isset($_SESSION["loginName"])) {
        header("refresh: 0.5; url = request.php");
        exit();
    }
}

if (isset($_POST["login"])) {
    $loginName = $_POST["loginName"] ?? '';
    $loginPassword = $_POST["loginPassword"] ?? '';

    $con = mysqli_connect("localhost", "root", "", "aqi");
    if (!$con) {
        echo "Database connection failed.";
        header("refresh: 2; url = index.html");
        exit();
    }
    $sql = "SELECT * FROM user WHERE `Full Name` = ? AND `Password` = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $loginName, $loginPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION["loginName"] = $loginName;
        echo "You are now redirected";
        header("refresh: 2; url = request.php");
        exit();
    } else {
        echo "User not found";
        header("refresh: 2; url = index.html");
        exit();
    }
}
if (!isset($_POST["login"])) {
    echo "Fill the username and password." . "<br>";
    header("refresh: 2; url = index.html");
    exit();
}
?>