<?php
include 'db.php';
include 'auth.php';
redirectIfLoggedIn();

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT employeeID, name, password, role FROM employees WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            $_SESSION['employee_id'] = $user['employeeID'];
            $_SESSION['employee_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            header("Location: dashboard.php");
            exit();
        } else $error = "Wrong password.";
    } else $error = "Email not found.";
}
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-primary d-flex align-items-center min-vh-100">
<div class="container"><div class="row justify-content-center"><div class="col-md-4">
<div class="card shadow"><div class="card-body p-5">
<h3 class="text-center mb-4">Login</h3>
<?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
<form method="POST">
    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
    <button class="btn btn-primary w-100">Login</button>
</form>
<div class="text-center mt-3"><a href="register.php">Register</a></div>
</div></div></div></div></div></body></html>