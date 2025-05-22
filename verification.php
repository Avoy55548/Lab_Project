<?php
session_start();
if (isset($_POST["login"])) {
    $loginName = trim($_POST["loginName"] ?? '');
    $loginPassword = trim($_POST["loginPassword"] ?? '');

    $con = mysqli_connect("localhost", "root", "", "aqi");
    if (!$con) {
        header("Location: index.html");
        exit();
    }
    $sql = "SELECT * FROM user WHERE `Full Name` = ? AND `Password` = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $loginName, $loginPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row) {
        $_SESSION["loginName"] = $loginName;
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