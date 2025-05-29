<?php
session_start();
if (isset($_POST["login"])) {
    $loginEmail = trim($_POST["loginEmail"] ?? '');
    $loginPassword = trim($_POST["loginPassword"] ?? '');

    $con = mysqli_connect("localhost", "root", "", "aqi");
    if (!$con) {
        header("Location: index.html");
        exit();
    }
    $sql = "SELECT * FROM user WHERE `Email` = ? AND `Password` = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $loginEmail, $loginPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row) {
        $_SESSION["loginEmail"] = $loginEmail;
        header("Location: request.php");
        exit();
    } else {
        header("Location: index.html");
        exit();
    }
}

header("Location: index.html");
exit();
?>