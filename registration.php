<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = [
        "firstName"  => $_POST["firstName"] ?? "",
        "middleName" => $_POST["middleName"] ?? "",
        "lastName"   => $_POST["lastName"] ?? "",
        "suffix"     => $_POST["suffix"] ?? "",
        "mobile"     => $_POST["mobile"] ?? "",
        "email"      => $_POST["email"] ?? "",
        "batch"      => $_POST["batch"] ?? "",
        "section"    => $_POST["section"] ?? ""
    ];

  
    $_SESSION['users'][] = $user;


    header("Location: users.php");
    exit;
}
