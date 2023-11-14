<?php
session_start();
$conn=mysqli_connect("localhost","root",'',"dashboard");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM employees where email='$email' and password='$password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['employee_id'] = $row['id'];

    if ($row['is_admin'] == 1) {
        header("Location: dashboard/dash_admin/index.php?id=" . $row['id']); // تحويل المشرفين إلى لوحة التحكم الخاصة بهم
    } else {
        header("Location: dashboard/dash_emp/index.php?id=" . $row['id']); // تحويل الموظفين إلى لوحة التحكم الخاصة بهم
    }
} else {
    echo "<body bgcolor='#6C7293'";
    echo "<h2 style='color:darkred;text-align:center;font-family:Bell MT;font-size:35px;padding-right:10px;margin-top:100px;'>Incorrect email or password </h2>";
    echo "<div style='margin-right:400px;padding-top:20px;'>";
    echo "<h3 style='color:#191C24;margin-left:400px;font-size:22px;border-bottom:solid 1px darkred;'>Verify the entry information</h3>";
    echo "</div>";
    header("Refresh:3; URL=login.html");
}

$conn->close();
?>
