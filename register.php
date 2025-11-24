<?php include 'db.php'; $msg = "";
if ($_POST) {
    $name = $_POST['name']; $email = $_POST['email']; $phone = $_POST['phone'];
    $pass = $_POST['password']; $dept = $_POST['department']; $position = $_POST['position'];

    $stmt = $conn->prepare("INSERT INTO employees (name, email, phone, password, departmentID, position, salary) VALUES (?, ?, ?, ?, ?, ?, 0.00)");
    $stmt->bind_param("ssssis", $name, $email, $phone, $pass, $dept, $position);
    if ($stmt->execute()) $msg = "Registered! Login now.";
    else $msg = "Email already exists!";
}
$depts = $conn->query("SELECT * FROM departments");
?>
<!DOCTYPE html><html><head><title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet"></head><body class="bg-light">
<div class="container py-5"><div class="row justify-content-center"><div class="col-md-6">
<div class="card shadow"><div class="card-body p-5">
<h3 class="text-center mb-4">Register New Employee</h3>
<?php if($msg) echo "<div class='alert alert-info'>$msg</div>"; ?>
<form method="POST">
    <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
    <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" required>
    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
    <select name="department" class="form-select mb-3" required>
        <?php while($d = $depts->fetch_assoc()): ?>
            <option value="<?=$d['departmentID']?>"><?=$d['departmentName']?></option>
        <?php endwhile; ?>
    </select>
    <input type="text" name="position" class="form-control mb-3" placeholder="Position (e.g. Developer)" required>
    <button class="btn btn-primary w-100">Register</button>
</form>
<a href="login.php" class="btn btn-link d-block text-center">Back to Login</a>
</div></div></div></div></div></body></html>