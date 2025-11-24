<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function redirectIfNotLoggedIn() {
    if (!isset($_SESSION['employee_id'])) {
        header("Location: login.php"); exit();
    }
}
function redirectIfLoggedIn() {
    if (isset($_SESSION['employee_id'])) {
        header("Location: dashboard.php"); exit();
    }
}
?>