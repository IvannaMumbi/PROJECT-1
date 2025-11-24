<?php include 'auth.php'; redirectIfNotLoggedIn(); include 'db.php'; ?>
<!DOCTYPE html><html><head><title>Payroll</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet"></head><body>
<?php include 'sidebar.php'; ?>
<h2>Payroll & Salary</h2>
<div class="card p-4">
    <h4>Basic Salary: <strong>$3,500</strong> / month</h4>
    <p>Bonus: $300 | Deductions: $150</p>
    <h5>Net Pay: <strong class="text-success">$3,650</strong></h5>
    <hr>
    <h5>Recent Payslips</h5>
    <table class="table">
        <tr><th>Month</th><th>Gross</th><th>Net</th><th>Status</th></tr>
        <tr><td>November 2025</td><td>$3,800</td><td>$3,650</td><td><span class="badge bg-success">Paid</span></td></tr>
        <tr><td>October 2025</td><td>$3,800</td><td>$3,650</td><td><span class="badge bg-success">Paid</span></td></tr>
    </table>
</div>
</div></div></body></html>